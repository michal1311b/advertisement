<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Work;
use App\State;
use App\Http\Requests\Advertisement\StoreRequest;

class AdvertisementController extends Controller
{
    public function index()
    {
        $works = Work::all();
        $states = State::all();

        return view('advertisement.create', compact('works', 'states'));
    }

    public function store(StoreRequest $request)
    {
        $input = $request->all();
        dd($input);
    }
}
