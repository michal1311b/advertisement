<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Subscriber2;

class Subscriber2Controller extends Controller
{
    public function index()
    {
        $subcribers = Subscriber2::get();

        return view('subscribers2.index', compact('subcribers'));
    }

    public function updatePrice(Subscriber2 $subscriber2)
    {
        $subscriber2->got_price = 1;
        $subscriber2->save();

        return back();
    }

    public function search()
    {
        $search = \Request::get('search'); //<-- we use global request to get the param of URI

        $subcribers = Subscriber2::where('invitation','like','%'.$search.'%')
            ->orderBy('invitation')
            ->paginate(20);

        return view('subscribers2.index ', compact(['subcribers']));
    }
}
