<?php

namespace App\Http\Controllers;

use App\Http\Requests\Live\StoreRequest;
use App\Live;
use Illuminate\Http\Request;

class LiveController extends Controller
{
    public function show()
    {
        $lives = Live::all();

        return view('live.show', compact('lives'));
    }

    public function store(StoreRequest $request)
    {
        Live::create($request->all());

        session()->flash('success', trans('live.store-success'));

        return back();
    }
}
