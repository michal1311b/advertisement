<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Subscriber;
use App\Mail\SubscriberMail;
use App\Http\Requests\Subscriber\StoreRequest;

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

    public function search()
    {
        $search = \Request::get('search'); //<-- we use global request to get the param of URI

        $subcribers = Subscriber::where('invitation','like','%'.$search.'%')
            ->orderBy('invitation')
            ->paginate(20);

        return view('subscribers1.index ', compact(['subcribers']));
    }

    public function store(StoreRequest $request)
    {
      $subscriber = Subscriber::create([
        'email' => $request->get('email'),
        'term1' => $request->get('term1'),
        'token' => md5(rand())
      ]);

      $subscriber->specializations()->attach($request->get('specializations'));

      \Mail::to($subscriber->email)->send(new SubscriberMail($subscriber));

      session()->flash('success',  __('Your email was stored. Check your email to verify subscription.'));

      return back();
    }

    public function verify(Request $request)
    {
      $subscriber = Subscriber::whereToken($request->input('token'))->first();
  
      $subscriber->verified_at = now();
  
      $subscriber->save();

      session()->flash('success',  __('Your subscription is verified. Thank You.'));
  
      return redirect()->route('blog.index');
    }
}
