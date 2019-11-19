<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StaticQuestionnaire extends Model
{
    protected $fillable = [
        'sex',
        'age',
        'specialization_id',
        'specializationp_id',
        'worktime',
        'workplace',
        'workplace_extra',
        'description',
        'criteria',
        'social_media_extra',
        'social_media',
        'email',
        'term1'
    ];
}
