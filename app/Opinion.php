<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Opinion extends Model
{
    use SoftDeletes;

    protected $table = 'opinionables';

    protected $fillable = [
        'user_id',
        'opinionable_id',
        'opinionable_type',
        'content'
    ];

    /**
     * Get all of the advertisements that are assigned this like.
     */
    public function advertisements()
    {
        return $this->morphedByMany('App\Advertisement', 'opinionable');
    }

    /**
     * Get all of the foreignOffers that are assigned this like.
     */
    public function foreignOffers()
    {
        return $this->morphedByMany('App\ForeignOffer', 'opinionable');
    }

    /**
    * Get all of the owning opinionable models.
    */
    public function opinionable()
    {
        return $this->morphTo();
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
