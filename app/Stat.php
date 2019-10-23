<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stat extends Model
{
  protected $fillable = [
    'url', 'host', 'action', 'title', 'email', 'session_key'
  ];
}
