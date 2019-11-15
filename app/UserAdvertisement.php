<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserAdvertisement extends Model
{
    protected $table = 'user_advertisement';
    protected $fillable= ['user_id', 'advertisement_id', 'score'];

    public $timestamps = false;

    public function advertisements()
    {
        return $this->belongsTo(Advertisement::class, 'advertisement_id');
    }
}
