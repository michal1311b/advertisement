<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Recipient extends Model
{
    protected $fillable = [
        'mailinglist_id',
        'email'
    ];

    public function mailinglist()
    {
        return $this->belongsTo(Mailinglist::class);
    }
}
