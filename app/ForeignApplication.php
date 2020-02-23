<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ForeignApplication extends Model
{
    protected $fillable= ['user_id', 'foreign_offer_id'];

    public function foreign()
    {
        return $this->belongsTo(ForeignOffer::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
