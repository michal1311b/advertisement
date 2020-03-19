<?php

namespace App\Http\Service;

class Geocoder
{
    public static function getCityFromLatLong($lat, $long)
    {
        $opts = array(
            'http' => array(
                'header' => "User-Agent: StevesCleverAddressScript 3.7.6\r\n"
        ));

        $context = stream_context_create($opts);

        $json = file_get_contents("https://nominatim.openstreetmap.org/reverse?format=jsonv2&lat=$lat&lon=$long", false, $context);
        $data = json_decode($json);

        if(isset($data->address) && isset($data->address->city))
        {
            return $data->address->city;
        } else {
            return 'unknown';
        }
    }
}
