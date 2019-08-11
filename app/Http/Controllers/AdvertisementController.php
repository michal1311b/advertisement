<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Advertisement;
use App\Work;
use App\State;
use App\Gallery;
use App\Http\Requests\Advertisement\StoreRequest;

class AdvertisementController extends Controller
{
    public function index()
    {
        $advertisements = Advertisement::with(['state', 'galleries'])->get();
        
        return view('advertisement.index', compact('advertisements'));
    }
    public function create(Request $request)
    {
        $request->user()->authorizeRoles(['employee', 'manager']);

        $works = Work::all();
        $states = State::all();
        
        return view('advertisement.create', compact('works', 'states'));
    }

    public function store(StoreRequest $request)
    {
        Advertisement::create($request->all());
        return back();
    }

    public function show($slug)
    {
        $advertisement = Advertisement::whereSlug($slug)
        ->with([
            'galleries',
            'user',
            'work',
            'state',
            'tags'
        ])
        ->firstOrFail();
        
        return view('advertisement.show', compact('advertisement'));
    }

    public function edit(Request $request, $id)
    {
        $request->user()->authorizeRoles(['employee', 'manager']);
        
        $advertisement = Advertisement::with('tags')->find($id);
        $works = Work::all();
        $states = State::all();

        $tags_array = [];
        foreach($advertisement->tags as $tag) {
            $tags_array[] = $tag->name;
        }
        
        $tags = implode(",", $tags_array);

        return view('advertisement.edit', compact(['advertisement', 'works', 'states', 'tags']));
    }

    public function deletePhoto($id)
    {
        $gallery = Gallery::findOrFail($id);
        $gallery->delete();

        return back();
    }

    public function update(Request $request, $id)
    {
        $advertisement = Advertisement::findOrFail($id);
        $advertisement->update($request->all());

        return back();
    }
}
