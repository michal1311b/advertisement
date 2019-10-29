<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Experience extends Model
{
    protected $fillable = [
        'workplace',
        'exp_city',
        'user_id',
        'exp_company_name',
        'start_date',
        'end_date',
        'until_now',
        'responsibility'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
