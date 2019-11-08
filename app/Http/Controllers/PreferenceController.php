<?php

namespace App\Http\Controllers;

use App\Advertisement;
use App\Http\Requests\Preference\StoreLocationUser;
use App\Location;
use App\LocationUser;
use App\User;
use App\Preference;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class PreferenceController extends Controller
{
    public function update(Preference $preference, Request $request)
    {
        DB::beginTransaction();

        try {
            $preference->update($request->all());

            DB::commit();

            session()->flash('success',  __('Your preference was successfully updated.'));

            return back();
        } catch(\Exception $e) {
            Log::info($e);
            DB::rollback();

            session()->flash('danger',  __('Something wrong try again'));

            return back()->withInput($request->all());
        }
    }

    public function storeLocation(User $user, StoreLocationUser $request)
    {
        $newLocation = LocationUser::where('location_id', $request->location_id)
        ->where('user_id', $user->id)->first();

        if($newLocation) {
            session()->flash('error',  __('Location already exists.'));
        
            return back();
        }

        $location = Location::find($request->get('user_location_id'));

        LocationUser::create([
            'user_id' => $user->id,
            'location_id' => $location->id,
            'radius' => $request->get('radius')
        ]);

        session()->flash('success',  __('Location added to Your profile.'));

        return back();
    }

    public function deleteLocation($id)
    {
        $userLocation = LocationUser::findOrFail($id);
        if ($userLocation->delete()) {
            session()->flash('success',  __('Prefered location was deleted successfully.'));

            return back();
        }
    }

    public function updateLocation(Location $location, $id, Request $request)
    {
        $newLocation = LocationUser::where('location_id', $request->location_id)
        ->where('user_id', $id)->first();

        if($newLocation) {
            session()->flash('error',  __('Location already exists.'));
        
            return back();
        }

        $userLocation = LocationUser::where('location_id', $location->id)
        ->where('user_id', $id)->first();
        
        $userLocation->location_id = $request->location_id;
        $userLocation->radius = $request->radius;
        $userLocation->save();

        session()->flash('success',  __('Location was updated successfully.'));
        
        return back();
    }

    public function showPreferences()
    {
        $advertisements = null;

        $user = Auth()
            ->user()
            ->load([
                'doctor',
                'preference',
                'specializations'
            ]);

        if($user->doctor)
        {
            $userLocalizations = LocationUser::where('user_id', $user->id)->pluck('location_id');
         
            foreach ($userLocalizations as $key => $location) {
                $all_adverts = collect($advertisements)
                ->merge(Advertisement::with(['galleries', 'specialization'])
                ->where('location_id', $location)
                ->where('settlement_id', $user->preference->settlement_id)
                ->where('work_id', $user->preference->work_id)
                ->where('currency_id', $user->preference->currency_id)
                ->whereIn('specialization_id', $user->specializations->pluck('id'))
                ->where('min_salary', '>=', $user->preference->min_salary)
                ->where('created_at', '>', Carbon::now()->subDays(30))
                ->get());
                $advertisements = $all_adverts;
            }

            return view('user.preferences', compact('advertisements', 'user'));

        } else {
            return redirect()->route('home');
        }
    }
}
