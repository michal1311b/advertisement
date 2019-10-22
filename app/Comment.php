<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'author_id',
        'post_id',
        'content',
        'posted_at'
    ];

    /**
     * Scope a query to only include comments posted last week.
     */
    public function scopeLastWeek(Builder $query): Builder
    {
        return $query->whereBetween('posted_at', [carbon('1 week ago'), now()])
                     ->latest();
    }
    /**
     * Scope a query to order comments by latest posted.
     */
    public function scopeLatest(Builder $query): Builder
    {
        return $query->orderBy('posted_at', 'desc');
    }
    /**
     * Return the comment's author
     */
    public function author()
    {
        return $this->belongsTo(User::class, 'author_id');
    }
    /**
     * Return the comment's post
     */
    public function post()
    {
        return $this->belongsTo(Post::class);
    }
}
