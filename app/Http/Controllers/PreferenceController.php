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

            session()->flash('danger',  trans('sentence.error-message'));

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

            if($userLocalizations->count() > 0)
            {
                $advertisements = Advertisement::whereIn('location_id', $userLocalizations)
                ->where('settlement_id', $user->preference->settlement_id)
                ->where('work_id', $user->preference->work_id)
                ->where('currency_id', $user->preference->currency_id)
                ->whereIn('specialization_id', $user->specializations->pluck('id'))
                ->where('min_salary', '>=', $user->preference->min_salary)
                ->where('created_at', '>', Carbon::now()->subDays(30))
                ->get();

                if($advertisements->count() > 0)
                {
                    foreach($advertisements as $advertisement) {
                        UserAdvertisement::create([
                            'user_id' => $user->id,
                            'advertisement_id' => $advertisement->id
                        ]);
                    }
                }
            }
        }
        \Log::info('Działa');
    }
}
