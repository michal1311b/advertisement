<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Work;

class AdvertisementController extends Controller
{
    public function index()
    {
        $works = Work::all();

        return view('advertisement.create', compact('works'));
    }
}
