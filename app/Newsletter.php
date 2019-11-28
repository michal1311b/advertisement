<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Newsletter extends Model
{
    protected $fillable = [
        'mailinglist_id',
        'title',
        'subject',
        'message',
        'sending_date',
        'sent'
    ];

    public function mailinglist()
    {
        return $this->belongsTo(Mailinglist::class);
    }
}
