<?php

namespace App\Http\Controllers;

use App\Advertisement;
use App\Http\Requests\Preference\StoreLocationUser;
use App\Location;
use App\LocationUser;
use App\User;
use App\Preference;
use App\UserAdvertisement;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Http\Requests\Preference\UpdateRequest;
use App\JobNotification;
use App\Mail\SendEmployeeAlert;
use App\Mail\SendJobAlert;

class PreferenceController extends Controller
{
    public function update(Preference $preference, UpdateRequest $request)
    {
        DB::beginTransaction();

        try {
            $preference->update($request->all());

            DB::commit();

            session()->flash('success',  trans('sentence.preference-update-success'));

            return back();
        } catch(\Exception $e) {
            Log::info($e);
            DB::rollback();

            session()->flash('error',  trans('sentence.error-message'));

            return back()->withInput($request->all());
        }
    }

    public function storeLocation(User $user, StoreLocationUser $request)
    {
        $newLocation = LocationUser::where('location_id', $request->location_id)
        ->where('user_id', $user->id)->first();

        if($newLocation) {
            session()->flash('error', trans('sentence.location-exists'));
        
            return back();
        }

        $location = Location::find($request->get('user_location_id'));

        LocationUser::create([
            'user_id' => $user->id,
            'location_id' => $location->id,
            'radius' => $request->get('radius')
        ]);

        session()->flash('success',  trans('sentence.location-add-success'));

        return back();
    }

    public function deleteLocation($id)
    {
        $userLocation = LocationUser::findOrFail($id);
        if ($userLocation->delete()) {
            session()->flash('success',  trans('sentence.delete-prefered-location'));

            return back();
        }
    }

    public function updateLocation(Location $location, $id, Request $request)
    {
        $newLocation = LocationUser::where('location_id', $request->location_id)
        ->where('user_id', $id)->first();

        if($newLocation) {
            session()->flash('error', trans('sentence.location-exists'));
        
            return back();
        }

        $userLocation = LocationUser::where('location_id', $location->id)
        ->where('user_id', $id)->first();
        
        $userLocation->location_id = $request->location_id;
        $userLocation->radius = $request->radius;
        $userLocation->save();

        session()->flash('success', trans('sentence.location-update-success'));
        
        return back();
    }

    public function showPreferences()
    {
        $user = Auth()
            ->user()
            ->load(['doctor']);

        if($user->doctor)
        {
            $preData = UserAdvertisement::where('user_id', $user->id)
            ->with(['advertisements', 'advertisements.galleries'])
            ->get();

            return view('user.preferences', compact('preData', 'user'));
        } else {
            return redirect()->route('home');
        }
    }

    public function buildPreferences()
    {
        $beginData = UserAdvertisement::truncate();

        $users = User::with(['doctor', 'preference', 'specializations'])
        ->has('doctor')
        ->has('preference')
        ->has('specializations')
        ->get();

        foreach($users as $user)
        {
            $userLocalizations = LocationUser::where('user_id', $user->id)
            ->pluck('location_id');

            $dataForRadius = LocationUser::where('user_id', $user->id)
            ->get();

            if($userLocalizations->count() > 0)
            {
                $locationData = [];
                foreach($dataForRadius as $loc)
                {
                    $searching_point = Location::find($loc->location_id);

                    $raw = DB::raw('(6371 * acos( cos( radians(' . $searching_point->latitude . ') ) * cos( radians( latitude ) ) * cos( radians( longitude ) - radians(' . $searching_point->longitude . ') ) + sin( radians(' . $searching_point->latitude . ') ) * sin( radians( latitude ) ) ) )  AS distance');
                   
                    $locations = DB::table('locations')->select('*', $raw)
                    ->orderBy('distance', 'ASC')
                    ->get();

                    foreach($locations->toArray() as $distance)
                    {
                        if($distance->distance <= $loc->radius)
                        {
                            array_push($locationData, $distance->id);
                        }
                    }
                }
                
                $locationIds = array_unique(array_merge($locationData, $userLocalizations->toArray()));
  
                if($user->preference->work_id == 1)
                {
                    $advertisements = Advertisement::whereIn('location_id', $locationIds)
                    ->where('settlement_id', $user->preference->settlement_id)
                    ->where('currency_id', $user->preference->currency_id)
                    ->whereIn('specialization_id', $user->specializations->pluck('id'))
                    ->where('max_salary', '>', $user->preference->min_salary)
                    ->where('min_salary', '<', $user->preference->min_salary)
                    ->where('expired_at', '>', Carbon::now())
                    ->get();
                } else {
                    $advertisements = Advertisement::whereIn('location_id', $locationIds)
                    ->where('settlement_id', $user->preference->settlement_id)
                    ->where('work_id', $user->preference->work_id)
                    ->where('currency_id', $user->preference->currency_id)
                    ->whereIn('specialization_id', $user->specializations->pluck('id'))
                    ->where('max_salary', '>', $user->preference->min_salary)
                    ->where('min_salary', '<', $user->preference->min_salary)
                    ->where('expired_at', '>', Carbon::now())
                    ->get();
                }

                if($advertisements->count() > 0)
                {
                    foreach($advertisements as $advertisement) {
                        UserAdvertisement::create([
                            'user_id' => $user->id,
                            'advertisement_id' => $advertisement->id
                        ]);

                        $notification = JobNotification::where('user_id', $user->id)
                        ->where('advertisement_id', $advertisement->id)->first();
                        if(!$notification) {
                            JobNotification::create([
                                'user_id' => $user->id,
                                'advertisement_id' => $advertisement->id
                            ]);
                        }
                    }
                }
            }
        }
    }

    public function sendJobAlert()
    {
        $notifications = JobNotification::where('is_send', 0) ->get();
        if($notifications)
        {
            foreach($notifications as $notification)
            {
                $user = User::find($notification->user_id);
                $advertiser = User::find($notification->advertisement->user->id);
                $advertisement = Advertisement::find($notification->advertisement_id);

                \Mail::to($user->email)->send(new SendJobAlert($user));
                if($user->doctor->cv !== null && $user->doctor->share === 1)
                {
                    \Mail::to($advertiser->email)->send(new SendEmployeeAlert($advertisement));
                }

                $notification->is_send = 1;
                $notification->save();
            }
        }
    }
}
