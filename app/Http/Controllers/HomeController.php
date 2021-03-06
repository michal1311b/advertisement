<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }


    /*
    public function someAdminStuff(Request $request)
    {
        $request->user()->authorizeRoles('manager');
        return view(‘some.view’);
    }
    */

    public function showVideoChat()
    {
        return view('page.video');
    }
}
