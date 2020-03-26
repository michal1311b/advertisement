<?php

namespace App\Http\Controllers;

use App\Advertisement;
use App\Application;
use Illuminate\Http\Request;
use App\Contact;
use App\ForeignApplication;
use App\User;
use App\Http\Service\Mailer;
use App\Notifications\NewMessage;
use App\Http\Requests\Contact\StoreRequest;
use App\Http\Requests\SiteContact\StoreRequest as SiteRequest;
use App\Mail\ApplicationEmail;
use App\Mail\ApplicationNurseMail;
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

        if($this->checkApplication($user, $advertisement, $request['emailType']))
        {
            session()->flash('error', trans('sentence.applied-again'));

            return back();
        } 

        DB::beginTransaction();

        try {
            $now = Carbon::now();
            $data = [];
            $data = array_merge($data, $request->all());

            if($request['emailType'] === 'offer')
            {
                Application::create([
                    'user_id' => $user->id,
                    'advertisement_id' => $advertisement->id
                ]);
    
                if($user->hasRole('doctor')) {
                    if($user->doctor && $user->doctor->cv) {
                        $data['cv'] = $user->doctor->cv;
                    } else {
                        $fileData = $request->file('cv');
                        $isHttp = isset($_SERVER['HTTPS']) ? 'https://' : 'http://';
                        $cv = $isHttp . "{$_SERVER['HTTP_HOST']}/" . $fileData->store('/cv' . '/' . Str::random(6) . $now->format('Y-m-d-hh-mm-ss') . Str::random(6), 'public');
                        $user->doctor->cv = $cv;
                        $user->doctor->save();
                        $data['cv'] = $cv;
                    }
                }
                
                if($user->hasRole('nurse')) {
                    if($user->nurse && $user->nurse->cv) {
                        $data['cv'] = $user->nurse->cv;
                    } else {
                        $fileData = $request->file('cv');
                        $isHttp = isset($_SERVER['HTTPS']) ? 'https://' : 'http://';
                        $cv = $isHttp . "{$_SERVER['HTTP_HOST']}/" . $fileData->store('/cv' . '/' . Str::random(6) . $now->format('Y-m-d-hh-mm-ss') . Str::random(6), 'public');
                        $user->nurse->cv = $cv;
                        $user->nurse->save();
                        $data['cv'] = $cv;
                    }
                }
    
                $data['user_id'] = $user->id;
                $data['advertisement_id'] = $advertisement->id;
    
                $contact = Contact::create($data);

                $room = $this->buildRoom(
                    $advertisement->title, 
                    $user->id, 
                    $contact->message,
                    $advertisement->user_id);
            } else {
                ForeignApplication::create([
                    'user_id' => $user->id,
                    'foreign_offer_id' => $advertisement->id
                ]);
    
                if($user->hasRole('doctor')) {
                    if($user->doctor && $user->doctor->cv) {
                        $data['cv'] = $user->doctor->cv;
                    } else {
                        $fileData = $request->file('cv');
                        $isHttp = isset($_SERVER['HTTPS']) ? 'https://' : 'http://';
                        $cv = $isHttp . "{$_SERVER['HTTP_HOST']}/" . $fileData->store('/cv' . '/' . Str::random(6) . $now->format('Y-m-d-hh-mm-ss') . Str::random(6), 'public');
                        $user->doctor->cv = $cv;
                        $user->doctor->save();
                        $data['cv'] = $cv;
                    }
                }
               
                if($user->hasRole('nurse')) {
                    if($user->nurse && $user->nurse->cv) {
                        $data['cv'] = $user->nurse->cv;
                    } else {
                        $fileData = $request->file('cv');
                        $isHttp = isset($_SERVER['HTTPS']) ? 'https://' : 'http://';
                        $cv = $isHttp . "{$_SERVER['HTTP_HOST']}/" . $fileData->store('/cv' . '/' . Str::random(6) . $now->format('Y-m-d-hh-mm-ss') . Str::random(6), 'public');
                        $user->nurse->cv = $cv;
                        $user->nurse->save();
                        $data['cv'] = $cv;
                    }
                }
    
                $data['user_id'] = $user->id;
                $data['foreign_offer_id'] = $advertisement->id;
    
                $room = $this->buildRoom(
                    $advertisement->title, 
                    $user->id, 
                    $request['message'],
                    $advertisement->user_id);
            }

            $user_owner = User::find($advertisement->user_id);
                    
            if($user->hasRole('doctor')) {
                \Mail::to($user_owner->email)
                ->send(new ApplicationEmail($user->doctor, $room['room']));
            } else {
                \Mail::to($user_owner->email)
                ->send(new ApplicationNurseMail($user->nurse, $room['room']));
            }
            $user_owner->notify(new ConversationNotification($room['message'], $user));

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

    private function buildRoom($title, $user_id, $message, $advert_user)
    {
        $room = Room::create([
            'name' => 'Chat room ' . $title,
            'user_id' => $user_id
        ]);

        $message = Message::create([
            'user_id' => $user_id,
            'message' => $message,
            'room_id' => $room->id
        ]);

        RoomUser::create([
            'user_id' => $user_id,
            'room_id' => $room->id
        ]);

        RoomUser::create([
            'user_id' => $advert_user,
            'room_id' => $room->id
        ]);

        $roomData = [
            'room' => $room,
            'message' => $message
        ];

        return $roomData;
    }

    private function checkApplication($user, $advertisement, $type)
    {
        if($type === 'offfer')
        {
            $application = Application::where('user_id', $user->id)
            ->where('advertisement_id', $advertisement->id)->get();
        } else {
            $application = ForeignApplication::where('user_id', $user->id)
            ->where('foreign_offer_id', $advertisement->id)->get();
        }

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
