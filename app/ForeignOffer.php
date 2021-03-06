<?php

namespace App;

use App\Http\Service\TextService;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ForeignOffer extends Model
{
    use SoftDeletes;
    use TextService;
    
    protected $fillable = [
        'title',
        'description',
        'profits',
        'requirements',
        'work_id',
        'state_id',
        'user_id',
        'specialization_id',
        'currency_id',
        'settlement_id',
        'city',
        'postCode',
        'street',
        'email',
        'phone',
        'image_profile',
        'min_salary',
        'max_salary',
        'term1',
        'term2',
        'term3',
        'negotiable',
        'slug',
        'expired_at',
        'longitude',
        'latitude'
    ];

    public static function uploadDir()
    {
        return '/uploads';
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function currency()
    {
        return $this->belongsTo(Currency::class);
    }

    public function settlement()
    {
        return $this->belongsTo(Settlement::class);
    }

    public function work()
    {
        return $this->belongsTo(Work::class);
    }

    public function specialization()
    {
        return $this->belongsTo(Specialization::class);
    }

    public function foreign_visits()
    {
        return $this->hasMany(ForeignVisit::class);
    }

    public function likes()
    {
        return $this->morphToMany('App\User', 'likeable')->whereDeletedAt(null);
    }

    public function getIsLikedAttribute()
    {
        $like = $this->likes()->where('user_id', Auth::id())->first();
        
        return (!is_null($like)) ? true : false;
    }

    public static function create(array $attributes = [])
    {
        $latLon = self::get_lat_long($attributes['street'], $attributes['city']);
        $latLonData = explode(',', $latLon);

        $attributes['slug'] = TextService::getUniqueSlug($attributes['title']);
        $entry = new ForeignOffer();
        $entry->title = $attributes['title'];
        $entry->description = $attributes['description'];
        $entry->profits = $attributes['profits'];
        $entry->requirements = $attributes['requirements'];
        $entry->work_id = $attributes['work_id'];
        $entry->user_id = auth()->user()->id ?? $attributes['user_id'];
        $entry->specialization_id = $attributes['specialization_id'];
        $entry->currency_id = $attributes['currency_id'];
        $entry->settlement_id = $attributes['settlement_id'];
        $entry->postCode = $attributes['postCode'];
        $entry->street = $attributes['street'];
        $entry->city = $attributes['city'];
        $entry->phone = $attributes['phone'];
        $entry->email = $attributes['email'];
        $entry->min_salary = $attributes['min_salary'];
        $entry->max_salary = $attributes['max_salary'];
        $entry->term1 = $attributes['term1'] === true ? 1 : 0;
        $entry->term2 = $attributes['term2'] === true ? 1 : 0;
        $entry->term3 = $attributes['term3'] === true ? 1 : 0;
        $entry->negotiable = $attributes['negotiable'] === true ? 1 : 0;
        $entry->expired_at = Carbon::now()->addDays(30);
        $entry->slug = $attributes['slug'];
        $entry->latitude = $latLonData[0];
        $entry->longitude = $latLonData[1];

        $now = Carbon::now();
        $newName = $now->getTimestamp() . TextService::generateRandomString();

        if(isset($attributes['image_profile'][0]))
        {
            $mimeType = substr($attributes['image_profile'][0], 11, strpos($attributes['image_profile'][0], ';')-11);

            Storage::disk('public')->put(self::uploadDir() . '/' . $newName. '.' . $mimeType, base64_decode($attributes['image_profile'][0]));
            $entry->image_profile = "https://{$_SERVER['HTTP_HOST']}" . self::uploadDir() . '/' . $newName. '.' . $mimeType;
        } else {
            $entry->image_profile = Auth()->user()->avatar;
        }
        
        $entry->save();
    }

    protected static function get_lat_long($address, $city){
        $opts = array(
            'http' => array(
                'header' => "User-Agent: StevesCleverAddressScript 3.7.6\r\n"
        ));

        $context = stream_context_create($opts);
        $address = str_replace(" ", "+", $address);
        $trimCity = trim($city);
        $cityUrl = str_replace(" ", "+", $trimCity);
        $json = file_get_contents("https://nominatim.openstreetmap.org/search?q=$address,+$cityUrl&format=json&polygon=1&addressdetails=1", false, $context);
        $json = json_decode($json);
        $data = get_object_vars($json[0]);

        $lat = $data['lat'];
        $long = $data['lon'];

        return $lat.','.$long;
    }
}
