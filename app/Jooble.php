<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jooble extends Model
{
    protected $fillable = [
        'title',
        'description',
        'term1',
        'term2',
        'term3',
        'location',
        'salary',
        'source',
        'type',
        'link',
        'company',
        'sourceId', 
        'email',
        'is_accepted'
    ];
}
