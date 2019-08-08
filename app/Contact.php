<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $fillable = [
        'user_id',
        'email',
        'emailType',
        'first_name',
        'city',
        'phone',
        'message',
        'term1'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
