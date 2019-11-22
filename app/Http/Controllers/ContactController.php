<?php

namespace App\Http\Controllers;

use App\Advertisement;
use Illuminate\Http\Request;
use App\Contact;
use App\User;
use App\Http\Service\Mailer;
use App\Notifications\NewMessage;
use App\Http\Requests\Contact\StoreRequest;
use App\Message;
use App\Room;
use App\RoomUser;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class ContactController extends Controller
{
    public function store(StoreRequest $request, Advertisement $advertisement)
    {
        DB::beginTransaction();

        try {
            $user = auth()->user();

            $now = Carbon::now();
            $data = [];
            $data = array_merge($data, $request->all());

            if($user->doctor && $user->doctor->cv)
            {
                $data['cv'] = $user->doctor->cv;
            } else {
                $fileData = $request->file('cv');
                $cv = "http://{$_SERVER['HTTP_HOST']}/" . $fileData->store('/cv' . '/' . Str::random(6) . $now->format('Y-m-d-hh-mm-ss') . Str::random(6), 'public');
                $user->doctor->cv = $cv;
                $user->doctor->save();
                $data['cv'] = $cv;
            }

            $data['user_id'] = $user->id;
            $data['advertisement_id'] = $advertisement->id;

            $contact = Contact::create($data);

            $room = Room::create([
                'name' => 'Chat room ' . $advertisement->title,
                'user_id' => $user->id
            ]);

            $message = Message::create([
                'user_id' => $user->id,
                'message' => $contact->message,
                'room_id' => $room->id
            ]);

            RoomUser::create([
                'user_id' => $user->id,
                'room_id' => $room->id
            ]);

            RoomUser::create([
                'user_id' => $advertisement->user_id,
                'room_id' => $room->id
            ]);
            
            // $this->sendEmail($contact, $advertisement->user_id);

            $user = User::find($advertisement->user_id);

            $user->notify(new NewMessage($contact));

            DB::commit();

            session()->flash('success', trans('sentence.message-send'));

            return back();
        } catch (\Exception $e) {
            Log::info($e);
            DB::rollback();

            session()->flash('error',  trans('sentence.error-message'));

            return back()->withInput($request->all());
        }
    }

    private function sendEmail(Contact $contact, $userId)
    {
        Mailer::sendEmail(
            $contact::with('user')
            ->find($userId)
        );
    }
}
