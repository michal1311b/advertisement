<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ForeignVisit extends Model
{
    protected $fillable = [
        'user_id', 'foreign_offer_id', 'is_doctor'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function foreign_offer()
    {
        return $this->belongsTo(ForeignOffer::class);
    }
}
