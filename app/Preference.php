<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Preference extends Model
{
    protected $fillable = [
        'settlement_id',
        'work_id',
        'min_salary',
        'currency_id',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function work()
    {
        return $this->belongsTo(Work::class);
    }

    public function settlement()
    {
        return $this->belongsTo(Settlement::class);
    }

    public function currency()
    {
        return $this->belongsTo(Currency::class);
    }
}
