<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subscriber extends Model
{
    protected $fillable = [
        'name', 'email',
        'email_verified_at', 'invitation',
        'got_price', 'event_name'
    ];
}
