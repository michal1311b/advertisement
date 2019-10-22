<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'title',
        'body',
        'cover',
        'slug',
        'is_published',
        'user_id',
        'category_id'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function pins()
    {
        return $this->hasMany(Pin::class);
    }

    /**
     * Return the post's comments
     */
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public static function getUniqueSlug($title)
    {
        return str_slug($title, '-');
    }
}
