<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Gallery;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;

class Advertisement extends Model
{
    use SoftDeletes;
    
    protected $fillable = [
        'title',
        'description',
        'profits',
        'requirements',
        'work_id',
        'state_id',
        'user_id',
        'location_id',
        'specialization_id',
        'currency_id',
        'settlement_id',
        'postCode',
        'street',
        'email',
        'phone',
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

    public function galleries()
    {
        return $this->hasMany(Gallery::class);
    }

    public function contacts()
    {
        return $this->hasMany(Contact::class);
    }

    public function tags()
    {
        return $this->hasMany(Tag::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function visits()
    {
        return $this->hasMany(Visit::class);
    }

    public function state()
    {
        return $this->belongsTo(State::class);
    }

    public function currency()
    {
        return $this->belongsTo(Currency::class);
    }

    public function settlement()
    {
        return $this->belongsTo(Settlement::class);
    }

    public function location()
    {
        return $this->belongsTo(Location::class);
    }

    public function work()
    {
        return $this->belongsTo(Work::class);
    }

    public function specialization()
    {
        return $this->belongsTo(Specialization::class);
    }

    public static function create(array $attributes = [])
    {
        $latLon = self::get_lat_long($attributes['street'], $attributes['location_id']);
        $latLonData = explode(',', $latLon);

        $attributes['slug'] = self::getUniqueSlug($attributes['title']);
        $entry = new Advertisement();
        $entry->title = $attributes['title'];
        $entry->description = $attributes['description'];
        $entry->profits = $attributes['profits'];
        $entry->requirements = $attributes['requirements'];
        $entry->work_id = $attributes['work_id'];
        $entry->state_id = $attributes['state_id'];
        $entry->user_id = auth()->user()->id ?? $attributes['user_id'];
        $entry->location_id = $attributes['location_id'];
        $entry->specialization_id = $attributes['specialization_id'];
        $entry->currency_id = $attributes['currency_id'];
        $entry->settlement_id = $attributes['settlement_id'];
        $entry->postCode = $attributes['postCode'];
        $entry->street = $attributes['street'];
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
        $entry->save();

        $now = Carbon::now();

        if(isset($attributes['galleries'])) {
            foreach($attributes['galleries'] as $k => $gallery) {
                if(is_numeric($k)) {
                    $fileData = new Gallery();
                    $fileData->oldName = '$gallery->getClientOriginalName()';
                    $fileData->newName = $now->getTimestamp() . $entry->generateRandomString();
                    $fileData->size = 666;
                    $fileData->mimeType = 'png';
                    @list($type, $gallery) = explode(';', $gallery);
                    @list(, $gallery) = explode(',', $gallery); 

                    Storage::disk('public')->put(self::uploadDir() . '/' . $fileData->newName. '.png', base64_decode($gallery));
                    $fileData->path = "https://{$_SERVER['HTTP_HOST']}" . self::uploadDir() . '/' . $fileData->newName. '.png';
                    $fileData->advertisement_id = $entry->id;
                    $entry->galleries()->save($fileData);
                }
            }
        }
        
        if(isset($attributes['tags'])) {
            $tags = explode(",", $attributes['tags'][0]);
            foreach($tags as $k => $tag) {
                if(is_numeric($k)) {
                    $tagData = new Tag();
                    $tagData->name = trim($tag);
                    $tagData->advertisement_id = $entry->id;
                    $tagData->slug = self::getUniqueSlug($tag);
                    $entry->tags()->save($tagData);
                }
            }
        }
    }

    public function update(array $attributes = [], array $options = [])
    {
        $latLon = self::get_lat_long($attributes['street'], $attributes['location_id']);
        $latLonData = explode(',', $latLon);
        $attributes['latitude'] = $latLonData[0];
        $attributes['longitude'] = $latLonData[1];

        if($this->title !== $attributes['title']) {
            $attributes['slug'] = self::getUniqueSlug($attributes['title']);
        }

        $now = Carbon::now();

        if(isset($attributes['galleries'])) {
            foreach($attributes['galleries'] as $k => $gallery) {
                if(is_numeric($k)) {
                    $fileData = new Gallery();
                    $fileData->oldName = '$gallery->getClientOriginalName()';
                    $fileData->newName = $now->getTimestamp() . $this->generateRandomString();
                    $fileData->size = 666;
                    $fileData->mimeType = 'png';
                    @list($type, $gallery) = explode(';', $gallery);
                    @list(, $gallery) = explode(',', $gallery); 

                    Storage::disk('public')->put(self::uploadDir() . '/' . $fileData->newName. '.png', base64_decode($gallery));
                    $fileData->path = "https://{$_SERVER['HTTP_HOST']}" . self::uploadDir() . '/' . $fileData->newName. '.png';
                    $fileData->advertisement_id = $this->id;
                    $this->galleries()->save($fileData);
                }
            }
        }

        if(isset($attributes['tags'])) {
            $tags = explode(",", $attributes['tags'][0]);
            foreach($this->tags as $tag)
            {
                $tag->delete();
            }
            
            $tags = $attributes['tags'];
            if(is_array($tags))
            {
                $explodedTag = explode(",", $tags[0]);
                foreach($explodedTag as $k => $tag)
                {
                    $tag = new Tag;
                    $tag->advertisement_id = $this->id;
                    $tag->name = trim($explodedTag[$k]);
                    $tag->slug = self::getUniqueSlug($explodedTag[$k]);
                    $tag->save();
                }
            }
        }

        parent::update($attributes, $options);
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
