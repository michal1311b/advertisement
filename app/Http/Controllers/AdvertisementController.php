<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Work;
use App\State;

class AdvertisementController extends Controller
{
    public function index()
    {
        $works = Work::all();
        $states = State::all();

        return view('advertisement.create', compact('works', 'states'));
    }

    public function store(Request $request)
    {
        $input = $request->all();
        dd($input);
    }
}
