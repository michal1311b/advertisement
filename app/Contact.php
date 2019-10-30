<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $fillable = [
        'user_id',
        'advertisement_id',
        'email',
        'emailType',
        'first_name',
        'city',
        'phone',
        'message',
        'cv',
        'term1'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function advertisement()
    {
        return $this->belongsTo(Advertisement::class);
    }

    public function replies()
    {
        return $this->hasMany(Reply::class);
    }
}
