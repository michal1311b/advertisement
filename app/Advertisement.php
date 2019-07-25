<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Gallery;
use Illuminate\Support\Facades\Storage;

class Advertisement extends Model
{
    protected $fillable = [
        'title',
        'description',
        'work_id',
        'state_id',
        'city',
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
        return $this->morphMany(Gallery::class, 'galleriable');
    }

    public static function create(array $attributes = [])
    {
        $attributes['slug'] = self::getUniqueSlug($attributes['title']);
        $entry = parent::create($attributes);

        if(isset($attributes['galleries'])) {
            foreach($attributes['galleries'] as $k => $gallery) {
                if(is_numeric($k)) {
                    $fileData = new Gallery();
                    $fileData->oldName = $gallery->getClientOriginalName();
                    $fileData->newName = \DateTime() . self::generateRandomString();
                    $fileData->size = $gallery->getClientSize();
                    $fileData->mimeType = $gallery->getClientMimeType();
                    $fileData->path = $gallery->store(self::uploadDir() . '/' . $entry->id . \DateTime(), 'public');
                    $fileData->advertisement_id = $entry->id;
                    
                    Storage::disk('public')->putFileAs(
                        'files/'.$filename,
                        $uploadedFile,
                        $filename
                    );
                    $entry->galleries()->save($fileData);
                }
            }
        }
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
