<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JobNotification extends Model
{
    protected $table = 'job_notifications';
    protected $fillable= ['user_id', 'advertisement_id', 'is_send'];

    public $timestamps = false;

    public function advertisement()
    {
        return $this->belongsTo(Advertisement::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
