<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Advertisement;
use App\Work;
use App\User;
use App\Location;
use App\State;
use App\Gallery;
use App\Http\Requests\Advertisement\StoreRequest;
use App\Jobs\SendEmailJob;
use Carbon\Carbon;

class AdvertisementController extends Controller
{
    public function index()
    {
        $advertisements = Advertisement::with(['state', 'galleries'])->paginate(5);
        $locations = Location::all();
        
        return view('advertisement.index', compact(['advertisements', 'locations']));
    }
    public function create(Request $request)
    {
        $request->user()->authorizeRoles(['company', 'admin']);

        $works = Work::all();
        $states = State::all();
        $locations = Location::all();
        
        return view('advertisement.create', compact('works', 'states', 'locations'));
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
        $request->user()->authorizeRoles(['company', 'admin']);
        
        $advertisement = Advertisement::with('tags')->find($id);
        $userId = $advertisement->user_id;
        $request->user()->checkAuthorization($request->user()->id, $userId);

        $works = Work::all();
        $states = State::all();
        $locations = Location::all();

        $tags_array = [];
        foreach($advertisement->tags as $tag) {
            $tags_array[] = $tag->name;
        }
        
        $tags = implode(",", $tags_array);

        return view('advertisement.edit', compact(['advertisement', 'works', 'states', 'tags', 'locations']));
    }

    public function deletePhoto($id)
    {
        $gallery = Gallery::findOrFail($id);
        $gallery->delete();

        return back();
    }

    public function update(StoreRequest $request, $id)
    {
        $advertisement = Advertisement::findOrFail($id);
        $advertisement->update($request->all());

        return back();
    }

    public function delete($id)
    {
        $advertisement = Advertisement::with(['tags', 'galleries'])->findOrFail($id);
        foreach($advertisement->tags as $tag) {
            $tag->delete();
        }
        foreach($advertisement->galleries as $gallery) {
            $gallery->delete();
        }
        if($advertisement->delete()) {
            return back();
        }
    }

    public function sendEmail()
    {
        $emailJob = (new SendEmailJob())->delay(Carbon::now()->addSeconds(5));
        dispatch($emailJob);

        echo 'email sent';
    }

    public function search(Request $request)
    {
        if($request->get('q') !== null) {
            $advertisements = Advertisement::query()
            ->orWhere('title', 'LIKE', '%' . $request->get('q') . '%')
            ->orWhere('description', 'LIKE', '%' . $request->get('q') . '%')
            ->paginate(5);
        } else {
            $advertisements = Advertisement::query()
            ->orWhere('location_id', (int)$request->get('location_id'))
            ->paginate(5);
        }
      

        $locations = Location::all();

        return view('advertisement.index', compact(['advertisements', 'locations']));
    }
}
