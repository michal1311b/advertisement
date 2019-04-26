<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Subscriber;

class SubscriberController extends Controller
{
    public function index()
    {
        $subcribers = Subscriber::get();

        return view('subscribers1.index', compact('subcribers'));
    }

    public function updatePrice(Subscriber $subscriber)
    {
        $subscriber->got_price = 1;
        $subscriber->save();

        return back();
    }
}
