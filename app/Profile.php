<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable = [
        'user_id',
        'last_name',
        'street',
        'post_code',
        'city',
        'last_name',
        'company_name',
        'company_street',
        'company_post_code',
        'company_city',
        'company_nip',
        'company_phone1',
        'company_phone2'
    ];

    public function user()
    {
    	return $this->belongsTo(User::class);
    }
}
