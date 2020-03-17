<?php

namespace App\Http\Controllers;

use App\Advertisement;
use App\Stat;
use App\Tracking;
use Carbon\Carbon;
use Illuminate\Http\Request;

class StatController extends Controller
{
    public function store(Request $request)
    {
        Stat::create($request->all());
    }

    public function tracking(Request $request)
    {
        Tracking::create($request->all());
    }

    public function getTracked(Request $request)
    {
        $tracked = Tracking::where(
            'session_key', 
            $request->get('session_key'))
            ->where(
            'email', 
            $request->get('email'))
            ->get();

        $locations = $tracked->pluck('location_id');
        $specializations = $tracked->pluck('specialization_id');

        $advertisements = Advertisement::select(
            'id',
            'slug',
            'title', 
            'min_salary', 
            'max_salary', 
            'location_id',
            'settlement_id',
            'specialization_id',
            'currency_id',
            'state_id',
            'user_id',
            'expired_at'
            )
        ->with([
            'state' => function($query){
                $query->select('id', 'name');
            }, 
            'settlement' => function($query){
                $query->select('id', 'name');
            }, 
            'galleries',  
            'location' => function($query){
                $query->select('id', 'city');
            }, 
            'specialization' => function($query){
                $query->select('id', 'name');
            },
            'currency' => function($query){
                $query->select('id', 'symbol');
            },
            'user' => function($query){
                $query->with('profile');
            }])
        ->whereIn('location_id', $locations)
        ->whereIn('specialization_id', $specializations)
        ->where('expired_at', '>', Carbon::now())
        ->orderBy('created_at', 'desc')
        ->take(5)
        ->get();

        return $advertisements;
    }
}
