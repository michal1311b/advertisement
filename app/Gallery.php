<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Advertisement;

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

    public function advertisement()
    {
        return $this->belongsTo(Advertisement::class);
    }
}
