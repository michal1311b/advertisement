<?php

namespace App\Http\Controllers;

use App\Advertisement;
use App\Application;
use App\Contact;
use App\ForeignApplication;
use App\ForeignOffer;
use App\User;
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
    /**
	 * Store an applications for Advertisements
     * @urlParam StoreRequest $request
     * 
     * @response view of advertisement or foreign's offer
	 */
    public function store(StoreRequest $request, $id)
    {
        $user = auth()->user();

        if($this->checkApplication($user, $id, $request['emailType']))
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
                $advertisement = Advertisement::find($id);
                 
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
                $advertisement = ForeignOffer::find($id);
                
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

            session()->flash('success', trans('email.message-send'));

            return back();
        } catch (\Exception $e) {
            Log::info($e);
            DB::rollback();

            session()->flash('error',  trans('sentence.error-message'));

            return back()->withInput($request->all());
        }
    }

    /**
	 * Store room for advertisement or foreign offers
     * @urlParam $title
     * @urlParam $user_id
     * @urlParam $message
     * @urlParam $advert_user
     * 
     * @response [
     *  room,
     *  message
     * ]
	 */
    private function buildRoom($title, $user_id, $message, $advert_user)
    {
        $room = Room::create([
            'name' =>  trans('notifications.message-from') . $title,
            'user_id' => $user_id,
            'recipient_id' => $advert_user
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

    /**
	 * Check if exist application for any advertisement or foreign offers
     * @urlParam $user
     * @urlParam $advertisement
     * @urlParam $type
     * 
     * @response true if application exists or void if it doesn't
	 */
    private function checkApplication($user, $advertisement, $type)
    {
        if($type === 'offer')
        {
            $application = Application::where('user_id', $user->id)
            ->where('advertisement_id', $advertisement)->first();
        } else {
            $application = ForeignApplication::where('user_id', $user->id)
            ->where('foreign_offer_id', $advertisement)->first();
        }

        if($application)
        {
            return true;
        }
    }

    /**
	 * Show site's contact form view
     * 
     * @response view 
     */
    public function show()
    {
        return view('contact.show');
    }

    /**
	 * Store site's contact gorm
     * @urlParam SiteRequest $request
     * 
     * @response view with site's contact form
	 */
    public function sendForm(SiteRequest $request)
    {
        DB::beginTransaction();

        try { 
            SiteContact::create($request->all());

            DB::commit();

            session()->flash('success', trans('email.message-send'));

            return back();
        } catch (\Exception $e) {
            Log::info($e);
            DB::rollback();

            session()->flash('error',  trans('sentence.error-message'));

            return back()->withInput($request->all());
        }
    }
}
