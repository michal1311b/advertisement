<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Work extends Model
{
    protected $fillable = [
        'title', 'slug', 'excerpt'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
