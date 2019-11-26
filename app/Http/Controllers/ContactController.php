<?php

namespace App\Http\Controllers;

use App\Advertisement;
use App\Application;
use Illuminate\Http\Request;
use App\Contact;
use App\User;
use App\Http\Service\Mailer;
use App\Notifications\NewMessage;
use App\Http\Requests\Contact\StoreRequest;
use App\Http\Requests\SiteContact\StoreRequest as SiteRequest;
use App\Mail\ApplicationEmail;
use App\Message;
use App\Notifications\ConversationNotification;
use App\Room;
use App\RoomUser;
use App\SiteContact;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class ContactController extends Controller
{
    public function store(StoreRequest $request, Advertisement $advertisement)
    {
        $user = auth()->user();

        if($this->checkApplication($user, $advertisement))
        {
            session()->flash('error', trans('sentence.applied-again'));

            return back();
        }

        DB::beginTransaction();

        try {
            Application::create([
                'user_id' => $user->id,
                'advertisement_id' => $advertisement->id
            ]);

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

            $user_owner = User::find($advertisement->user_id);

            \Mail::to($user_owner->email)
            ->send(new ApplicationEmail($user->doctor, $room));

            $user_owner->notify(new ConversationNotification($message, $user));

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

    private function checkApplication($user, $advertisement)
    {
        $application = Application::where('user_id', $user->id)
        ->where('advertisement_id', $advertisement->id)->get();

        if(count($application))
        {
            return true;
        }
    }

    public function show()
    {
        return view('contact.show');
    }

    public function sendForm(SiteRequest $request)
    {
        DB::beginTransaction();

        try { 
            SiteContact::create($request->all());

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
