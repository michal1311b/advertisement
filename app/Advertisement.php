<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Advertisement extends Model
{
    protected $fillable = [
        'title', 'description', 'work_id', 'slug'
    ];

    private static function getUniqueSlug($title)
    {
        $slug = str_slug($title, '-');
        $slugCount = count( Work::whereRaw("slug ~ '^{$slug}(-[0-9]*)?$'")->get() );
        return ($slugCount > 0) ? "{$slug}-{$slugCount}" : $slug;
    }
}
