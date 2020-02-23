<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Like extends Model
{
    use SoftDeletes;

    protected $table = 'likeables';

    protected $fillable = [
        'user_id',
        'likeable_id',
        'likeable_type',
    ];

    /**
     * Get all of the advertisements that are assigned this like.
     */
    public function advertisements()
    {
        return $this->morphedByMany('App\Advertisement', 'likeable');
    }

    /**
     * Get all of the foreignOffers that are assigned this like.
     */
    public function foreignOffers()
    {
        return $this->morphedByMany('App\ForeignOffer', 'likeable');
    }

    /**
    * Get all of the owning likeable models.
    */
    public function likeable()
    {
        return $this->morphTo();
    }
}
