<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $fillable = ['name', 'slug'];

    public function advertisement()
    {
        return $this->belongsTo(Advertisement::class);
    }
}
