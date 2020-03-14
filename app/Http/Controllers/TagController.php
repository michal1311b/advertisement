<?php

namespace App\Http\Controllers;

use App\Currency;
use App\Tag;
use App\Pin;
use App\Location;
use App\Specialization;
use App\State;
use Carbon\Carbon;

class TagController extends Controller
{
    public function show($slug, $page = 1)
    {
        $advertisements = Tag::with(['advertisement' => function($query) {
            $query->where('expired_at', '>', Carbon::now());
            $query->orderBy('expired_at', 'ASC');
        }])->where('slug', $slug)->paginate();

        $locations = Location::all();
        $specializations = Specialization::all();
        $currencies = Currency::get(['id', 'symbol']);
        $states = State::get(['id', 'name']);


        if ($advertisements) {
            return view('tag.index', compact(
                'advertisements', 
                'locations', 
                'specializations', 
                'currencies',
                'states'
            ));
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
