<?php

namespace App\Http\Controllers;

use App\Message;
use App\Notifications\ConversationNotification;
use App\Notifications\NewMessage;
use App\Room;
use App\RoomUser;
use App\User;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        $rooms = RoomUser::where('user_id', $user->id)
        ->with([
            'room' => function($query){
                $query->with('user', 'recipient');
            }
        ])
        ->paginate();

        return view('room.index', compact([
            'rooms',
            'user'
        ]));
    }

    public function show(Room $room, Request $request)
    {
        $user = auth()->user();
        
        if(($room->user_id === $user->id) || ($room->recipient_id === $user->id)) {
            if($request->has('read')) {
                $notification = $request->user()->notifications()->where('id', $request->read)->first();
                if($notification) {
                    $notification->markAsRead();
                }
            }
            
            $messages = Message::where('room_id', $room->id)
            ->with(['user', 'user.doctor', 'room'])
            ->orderBy('created_at', 'asc')
            ->paginate();
    
            return view('room.show', compact('messages'));
        } else {
            return back();
        }
    }

    public function reply(Request $request, Room $room)
    {
        $user = auth()->user();
        $message = Message::create([
            'room_id' => $room->id,
            'user_id' => $user->id,
            'message' => $request->get('reply')
        ]);

        $rcp = RoomUser::where('room_id', $room->id)
        ->where('user_id', '!=' , $user->id)
        ->with('user')->pluck('user_id');

        $recipient = User::find($rcp[0]);

        $recipient->notify(new ConversationNotification($message, $user));

        session()->flash('success', trans('email.message-send'));

        return back();
    }
}
