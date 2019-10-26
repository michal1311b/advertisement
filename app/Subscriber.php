<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subscriber extends Model
{
    protected $fillable = [
        'email',
        'term1',
        'verified_at',
        'token'
    ];

    public function specializations()
    {
        return $this->belongsToMany(Specialization::class)->withTimestamps();
    }
}
