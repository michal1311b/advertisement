<?php

namespace App\Http\Controllers;

use App\Advertisement;
use App\GeoIP;
use App\Stat;
use App\Tracking;
use Carbon\Carbon;
use Illuminate\Http\Request;

class StatController extends Controller
{
    public function store(Request $request)
    {
        Stat::create($request->all());

        if($request->ip())
        {
            $geoIP = unserialize(file_get_contents('http://www.geoplugin.net/php.gp?ip='.$request->ip()));
            
            if(is_array($geoIP) && !empty($geoIP))
            {
                GeoIP::create([
                    'ip' => $geoIP['geoplugin_request'],
                    'city' => $geoIP['geoplugin_city'],
                    'country' => $geoIP['geoplugin_countryName'],
                    'longitude' => $geoIP['geoplugin_longitude'],
                    'latitude' => $geoIP['geoplugin_latitude'],
                    'email' => $request->get('email'),
                    'session_key' => $request->get('session_key'),
                ]);
            }
        }
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

        $locations = array_unique($tracked->pluck('location_id')->toArray());
        $specializations = array_unique($tracked->pluck('specialization_id')->toArray());

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
