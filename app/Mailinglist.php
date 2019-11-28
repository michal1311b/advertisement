<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mailinglist extends Model
{
    protected $fillable = [
        'title'
    ];

    public function newsletters()
    {
        return $this->hasMany(Newsletter::class);
    }

    public function recipients()
    {
        return $this->hasMany(Recipient::class);
    }
}
