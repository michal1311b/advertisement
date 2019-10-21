<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pin extends Model
{
    protected $fillable = ['name', 'slug'];

    public function post()
    {
        return $this->belongsTo(Post::class);
    }

    public static function getUniqueSlug($title)
    {
        return str_slug($title, '-');
    }
}
