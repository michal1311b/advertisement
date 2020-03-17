<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tracking extends Model
{
    protected $fillable = [
        'location_id', 
        'state_id', 
        'specialization_id', 
        'email', 
        'session_key'
      ];

    public function state()
    {
        return $this->belongsTo(State::class);
    }

    public function location()
    {
        return $this->belongsTo(Location::class);
    }

    public function specialization()
    {
        return $this->belongsTo(Specialization::class);
    }
}
