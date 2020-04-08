<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Message;
use App\User;
use App\Events\MessageSent;
use Notification;
use App\Notifications\PushDemo;

class ChatsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display chat view 
     * 
     * @response view
     */
    public function index()
    {
        return view('chats');
    }

     /**
     * @response list of messages with user
     */
    public function fetchMessages()
    {
        return Message::with('user')->get();
    }

     /**
     * @queryParam $request 
     * 
     * @response [ status ]
     */
    public function sendMessage(Request $request)
    {
        $message = auth()->user()->messages()->create([
            'message' => $request->message
        ]);
        broadcast(new MessageSent($message->load('user')))->toOthers();

        Notification::send(User::all(), new PushDemo);

        return ['status' => 'success'];
    }
}
