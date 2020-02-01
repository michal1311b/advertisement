<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Settlement extends Model
{
    protected $fillable = [
        'name',
    ];

    public function advertisement()
    {
        return $this->belongsTo(Advertisement::class);
    }
}
