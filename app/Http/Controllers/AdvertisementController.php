<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Advertisement;
use App\Work;
use App\State;
use App\Http\Requests\Advertisement\StoreRequest;

class AdvertisementController extends Controller
{
    public function create()
    {
        $works = Work::all();
        $states = State::all();
        
        return view('advertisement.create', compact('works', 'states'));
    }

    public function store(StoreRequest $request)
    {
        Advertisement::create($request->all());
        return back();
    }

    public function show($id)
    {
        $advertisement = Advertisement::with(['galleries'])
        ->find($id);
        dd($advertisement);
    }
}
