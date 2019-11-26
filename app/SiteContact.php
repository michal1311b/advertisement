<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SiteContact extends Model
{
    protected $fillable = [
        'email', 
        'first_name',
        'city',
        'phone',
        'message',
        'term1'
    ];
}
