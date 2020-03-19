<?php

namespace App\Http\Controllers;

use App\GeoIP;
use App\Http\Service\Geocoder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GeoIPController extends Controller
{
    public function refillCity()
    {
        $geoips = GeoIP::where('city', '')->get();

        if(count($geoips) > 0) {
            foreach($geoips as $geoip)
            {
                $city = Geocoder::getCityFromLatLong($geoip->latitude, $geoip->longitude);

                $geoip->city = $city;
                $geoip->save();
            }
        }
    }

    public function showVisitors()
    {
        $visitors =  $geoips = GeoIP::select(
            DB::raw(
            'session_key',
            'city', 
            'country', 
            'email', 
            'latitude', 
            'longitude'
        ))
        ->where('city', '!=', '')
        ->groupBy('session_key')
        ->get();

        return view('admin.visitors', compact('visitors'));
    }
}
