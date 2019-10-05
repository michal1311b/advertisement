<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Cache;

class Language extends Model
{
    use SoftDeletes;

    protected $primaryKey = 'lang_key';
    protected $casts = ['lang_key' => 'string'];
    protected $hidden = ['created_at', 'updated_at', 'deleted_at'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'local_name',
        'lang_key',
    ];

    public static function getAllLanguages()
    {
        return json_decode(Cache::get('languages_list', function () {
            return json_encode(parent::all());
        }));
    }
}
