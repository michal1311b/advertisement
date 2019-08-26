<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{
    protected $fillable = [
        'email',
        'contact_id',
        'emailType',
        'message'
    ];

    public function contact()
    {
        return $this->belongsTo(Contact::class);
    }
}
