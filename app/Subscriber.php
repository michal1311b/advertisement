<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subscriber extends Model
{
    protected $fillable = [
        'first_name', 'last_name', 'email',
        'email_verified_at', 'invitation',
        'got_price', 'event_name', 'address',
        'city', 'post_code',
    ];
}
