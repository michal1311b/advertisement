<?php

namespace App\Http\Controllers;

use App\Tag;
use App\Pin;
use App\Location;
use App\Specialization;
use Carbon\Carbon;

class TagController extends Controller
{
    public function show($slug, $page = 1)
    {
        $advertisements = Tag::with(['advertisement' => function($query) {
            $query->where('expired_at', '>', Carbon::now());
            $query->whereNotNull('deleted_at');
        }])->where('slug', $slug)->paginate(5);

        $locations = Location::all();
        $specializations = Specialization::all();

        if ($advertisements) {
            return view('tag.index', compact('advertisements', 'locations', 'specializations'));
        } else {
            return back();
        }
    }

    public function showPost($slug, $page = 1)
    {
        $pins = Pin::with('post')->where('slug', $slug)->paginate(5);

        if ($pins) {
            return view('blog.tag.index', compact('pins'));
        }
    }
}
