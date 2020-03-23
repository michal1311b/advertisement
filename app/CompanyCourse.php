<?php

namespace App;

use App\Http\Service\TextService;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;

class CompanyCourse extends Model
{
    use SoftDeletes;
    use TextService;

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
        'longitude',
        'facebook'
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

    public function specialization()
    {
        return $this->belongsTo(Specialization::class);
    }

    public static function create(array $attributes = [])
    {
        $latLon = self::get_lat_long($attributes['street'], $attributes['location_id']);
        $latLonData = explode(',', $latLon);

        $start = strtotime($attributes['start_date']);
        $end = strtotime($attributes['end_date']);

        $attributes['slug'] = TextService::getUniqueSlug($attributes['title']);
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
        $entry->facebook = $attributes['facebook'];
        $entry->start_date = date('Y-m-d', $start);
        $entry->end_date = date('Y-m-d', $end);
        $entry->term1 = $attributes['term1'] === true ? 1 : 0;
        $entry->term2 = $attributes['term2'] === true ? 1 : 0;
        $entry->term3 = $attributes['term3'] === true ? 1 : 0;
        $entry->slug = $attributes['slug'];
        $entry->latitude = $latLonData[0];
        $entry->longitude = $latLonData[1];

        $now = Carbon::now();

        if(isset($attributes['galleries'])) {
            $mimeType = substr($attributes['galleries'][0], 11, strpos($attributes['galleries'][0], ';')-11);
            $newName = $now->getTimestamp() . TextService::generateRandomString();
            Storage::disk('public')->put(self::uploadDir() . '/' . $newName. '.' . $mimeType, base64_decode($attributes['galleries'][0]));
            $isHttp = isset($_SERVER['HTTPS']) ? 'https://' : 'http://';
            $entry->avatar = $isHttp . "{$_SERVER['HTTP_HOST']}" . self::uploadDir() . '/' . $newName. '.' . $mimeType;
        }
        $entry->save();
    }

    public function update(array $attributes = [], array $options = [])
    {
        $latLon = self::get_lat_long($attributes['street'], $attributes['location_id']);
        $latLonData = explode(',', $latLon);
        $attributes['latitude'] = $latLonData[0];
        $attributes['longitude'] = $latLonData[1];

        if($this->title !== $attributes['title']) {
            $attributes['slug'] = TextService::getUniqueSlug($attributes['title']);
        }

        $now = Carbon::now();

        if(isset($attributes['galleries'])) {
            $mimeType = substr($attributes['galleries'][0], 11, strpos($attributes['galleries'][0], ';')-11);
            $newName = $now->getTimestamp() . TextService::generateRandomString();
            Storage::disk('public')->put(self::uploadDir() . '/' . $newName. '.' . $mimeType, base64_decode($attributes['galleries'][0]));
            $isHttp = isset($_SERVER['HTTPS']) ? 'https://' : 'http://';
            $this->avatar = $isHttp . "{$_SERVER['HTTP_HOST']}" . self::uploadDir() . '/' . $newName. '.' . $mimeType;
        }

        parent::update($attributes, $options);
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
