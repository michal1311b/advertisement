<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    protected $fillable = [
        'pwz',
        'birthday',
        'user_id'
    ];
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
