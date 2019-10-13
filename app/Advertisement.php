<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Gallery;
use Carbon\Carbon;

class Advertisement extends Model
{
    protected $fillable = [
        'title',
        'description',
        'work_id',
        'state_id',
        'user_id',
        'location_id',
        'postCode',
        'street',
        'email',
        'phone',
        'term1',
        'term2',
        'term3',
        'slug'
    ];

    public static function uploadDir()
    {
        return '/advertisements';
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

    public function state()
    {
        return $this->belongsTo(State::class);
    }

    public function location()
    {
        return $this->belongsTo(Location::class);
    }

    public function work()
    {
        return $this->belongsTo(Work::class);
    }

    public static function create(array $attributes = [])
    {
        $attributes['slug'] = self::getUniqueSlug($attributes['title']);
        $entry = new Advertisement();
        $entry->title = $attributes['title'];
        $entry->description = $attributes['description'];
        $entry->work_id = $attributes['work_id'];
        $entry->state_id = $attributes['state_id'];
        $entry->user_id = auth()->user()->id;
        $entry->location_id = $attributes['location_id'];
        $entry->postCode = $attributes['postCode'];
        $entry->street = $attributes['street'];
        $entry->phone = $attributes['phone'];
        $entry->email = $attributes['email'];
        $entry->term1 = $attributes['term1'];
        $entry->term2 = $attributes['term2'];
        $entry->term3 = $attributes['term3'];
        $entry->slug = $attributes['slug'];
        $entry->save();

        $now = Carbon::now();

        if(isset($attributes['galleries'])) {
            foreach($attributes['galleries'] as $k => $gallery) {
                if(is_numeric($k)) {
                    $fileData = new Gallery();
                    $fileData->oldName = $gallery->getClientOriginalName();
                    $fileData->newName = $now->getTimestamp() . $entry->generateRandomString();
                    $fileData->size = $gallery->getClientSize();
                    $fileData->mimeType = $gallery->getClientMimeType();
                    $fileData->path = "http://{$_SERVER['HTTP_HOST']}/" .$gallery->store(self::uploadDir() . '/' . $entry->id . '_' . $now->format('Y-m-d'), 'public');
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
        if($this->title !== $attributes['title']) {
            $attributes['slug'] = self::getUniqueSlug($attributes['title']);
        }

        $now = Carbon::now();

        if(isset($attributes['galleries'])) {
            foreach($attributes['galleries'] as $k => $gallery) {
                if(is_numeric($k)) {
                    $fileData = new Gallery();
                    $fileData->oldName = $gallery->getClientOriginalName();
                    $fileData->newName = $now->getTimestamp() . $this->generateRandomString();
                    $fileData->size = $gallery->getClientSize();
                    $fileData->mimeType = $gallery->getClientMimeType();
                    $fileData->path = "http://{$_SERVER['HTTP_HOST']}/" .$gallery->store(self::uploadDir() . '/' . $this->id . '_' . $now->format('Y-m-d'), 'public');
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
}
