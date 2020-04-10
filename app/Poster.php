<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Poster extends Model
{
    protected $fillable = [
        'posterable_id',
        'posterable_type',
        'path'
    ];

    /**
     * Get all of the advertisements that are assigned this like.
     */
    public function advertisements()
    {
        return $this->morphedByMany('App\Advertisement', 'posterable');
    }

    /**
     * Get all of the foreignOffers that are assigned this like.
     */
    public function foreignOffers()
    {
        return $this->morphedByMany('App\ForeignOffer', 'posterable');
    }

    /**
    * Get all of the owning opinionable models.
    */
    public function opinionable()
    {
        return $this->morphTo();
    }
}
