<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subscriber extends Model
{
    protected $fillable = [
        'email',
        'term1'
    ];

    public function specializations()
    {
        return $this->belongsToMany(Specialization::class)->withTimestamps();
    }
}
