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
        'description',
        'criteria',
        'email',
        'term1'
    ];
}
