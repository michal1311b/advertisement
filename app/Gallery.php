<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    protected $fillable = [
        'oldName',
        'newName',
        'mimeType',
        'size',
        'path',
        'advertisement_id'
    ];

    public function galleriable()
    {
        return $this->morphTo();
    }
}
