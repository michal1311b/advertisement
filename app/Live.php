<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Live extends Model
{
    protected $fillable = [
        'company_name',
        'status',
        'city',
        'comment',
        'link'
    ];
}
