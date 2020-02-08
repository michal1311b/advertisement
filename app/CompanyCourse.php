<?php

namespace App;

use Carbon\Carbon;
use DateTime;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;

class CompanyCourse extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'title',
        'description',
        'state_id',
        'user_id',
        'location_id',
        'currency_id',
        'specialization_id',
        'postCode',
        'street',
        'phone',
        'price',
        'start_date',
        'end_date',
        'term1',
        'term2',
        'term3',
        'slug',
        'avatar',
        'points',
        'latitude',
        'longitude'
    ];

    public static function uploadDir()
    {
        return '/courses';
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function state()
    {
        return $this->belongsTo(State::class);
    }

    public function currency()
    {
        return $this->belongsTo(Currency::class);
    }

    public function location()
    {
        return $this->belongsTo(Location::class);
    }

    public static function create(array $attributes = [])
    {
        $latLon = self::get_lat_long($attributes['street'], $attributes['location_id']);
        $latLonData = explode(',', $latLon);

        $start = strtotime($attributes['start_date']);
        // $end = gmdate('Y-m-d H:i:s', $attributes['end_date']);
        \Log::info($start);
        \Log::info($end);

        $attributes['slug'] = self::getUniqueSlug($attributes['title']);
        $entry = new CompanyCourse();
        $entry->title = $attributes['title'];
        $entry->description = $attributes['description'];
        $entry->state_id = $attributes['state_id'];
        $entry->user_id = auth()->user()->id ?? $attributes['user_id'];
        $entry->location_id = $attributes['location_id'];
        $entry->specialization_id = $attributes['specialization_id'];
        $entry->currency_id = $attributes['currency_id'];
        $entry->postCode = $attributes['postCode'];
        $entry->street = $attributes['street'];
        $entry->phone = $attributes['phone'];
        $entry->points = $attributes['points'];
        $entry->price = $attributes['price'];
        $entry->start_date = date('Y-m-d', $start->format('Y-m-d'));
        $entry->end_date = date('Y-m-d', $end->format('Y-m-d'));
        $entry->term1 = $attributes['term1'] === true ? 1 : 0;
        $entry->term2 = $attributes['term2'] === true ? 1 : 0;
        $entry->term3 = $attributes['term3'] === true ? 1 : 0;
        $entry->slug = $attributes['slug'];
        $entry->latitude = $latLonData[0];
        $entry->longitude = $latLonData[1];

        $now = Carbon::now();

        if(isset($attributes['galleries'])) {
            $newName = $now->getTimestamp() . $entry->generateRandomString();
            Storage::disk('public')->put(self::uploadDir() . '/' . $newName. '.png', base64_decode($attributes['galleries'][0]));
            $entry->avatar = "https://{$_SERVER['HTTP_HOST']}" . self::uploadDir() . '/' . $newName. '.png';
        }
        $entry->save();
    }

    private function generateRandomString($length = 10) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }

    private static function getUniqueSlug($title)
    {
        return str_slug($title, '-');
    }

    protected static function get_lat_long($address, $city){
        $location = Location::where('id', $city)->count();
        $ct = Location::where('id', $city)->first();
        
        if($location === 0) {
            $opts = array(
                'http' => array(
                    'header' => "User-Agent: StevesCleverAddressScript 3.7.6\r\n"
            ));

            $context = stream_context_create($opts);
            $address = str_replace("ul. ", "", $address);
            $address = str_replace(" ", "+", $address);
            $trimCity = trim($city);
            $cityUrl = str_replace(" ", "+", $trimCity);
            $json = file_get_contents("https://nominatim.openstreetmap.org/search?q=$address,+$cityUrl&format=json&polygon=1&addressdetails=1", false, $context);
            $json = json_decode($json);
            $data = get_object_vars($json[0]);

            $lat = $data['lat'];
            $long = $data['lon'];
            
            Location::create([
                'city' => ucfirst($city),
                'longitude' => $long,
                'latitude' => $lat
            ]);

            return $lat.','.$long;
        } else {
            $opts = array(
                'http' => array(
                    'header' => "User-Agent: StevesCleverAddressScript 3.7.6\r\n"
            ));

            $context = stream_context_create($opts);
            $address = str_replace(" ", "+", $address);
            $trimCity = trim($ct->city);
            $cityUrl = str_replace(" ", "+", $trimCity);
            $json = file_get_contents("https://nominatim.openstreetmap.org/search?q=$address,+$cityUrl&format=json&polygon=1&addressdetails=1", false, $context);
            $json = json_decode($json);
            $data = get_object_vars($json[0]);

            $lat = $data['lat'];
            $long = $data['lon'];

            return $lat.','.$long;
        }
    }
}
