<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    protected $fillable = [
        'title',
        'shot_description',
        'body',
        'slug'
    ];

    public static function create(array $attributes = [])
    {
        $attributes['slug'] = self::getUniqueSlug($attributes['title']);
        $entry = new Page();
        $entry->title = $attributes['title'];
        $entry->body = $attributes['body'];
        $entry->shot_description = $attributes['shot_description'];
        $entry->slug = $attributes['slug'];
        $entry->save();
    }

    public function update(array $attributes = [], array $options = [])
    {
        if($this->title !== $attributes['title']) {
            $attributes['slug'] = self::getUniqueSlug($attributes['title']);
        }

        parent::update($attributes, $options);
    }

    private static function getUniqueSlug($title)
    {
        return str_slug($title, '-');
    }
}
