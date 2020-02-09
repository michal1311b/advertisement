<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Participant extends Model
{
    protected $fillable= [
        'email',
        'first_name',
        'last_name',
        'street',
        'city',
        'post_code',
        'phone',
        'company_nip',
        'company_name',
        'company_street',
        'company_city',
        'company_post_code',
        'company_phone',
        'comments',
        'company_course_id',
        'term1'
    ];

    public function company_course()
    {
        return $this->belongsTo(CompanyCourse::class);
    }
}
