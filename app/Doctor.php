<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    protected $fillable = [
        'pwz',
        'birthday',
        'sex',
        'user_id',
        'cv'
    ];
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
