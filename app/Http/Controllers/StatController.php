<?php

namespace App\Http\Controllers;

use App\Stat;
use Illuminate\Http\Request;

class StatController extends Controller
{
    public function store(Request $request)
    {
        Stat::create($request->all());
    }
}
