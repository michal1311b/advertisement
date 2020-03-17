<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GeoIP extends Model
{
    protected $fillable = [
        'ip',
        'city',
        'country',
        'longitude',
        'latitude',
        'email',
        'session_key'
    ];
}
