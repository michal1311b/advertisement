<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserLanguage extends Model
{
    protected $table = 'language_user';
    protected $fillable= ['user_id', 'lang_key', 'level'];

    public $timestamps = false;

    public function language()
    {
        return $this->belongsTo(Language::class, 'lang_key');
    }
}
