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
<<<<<<< HEAD
        $this->middleware('auth');
=======
        $this->middleware(['auth', 'verified']);
>>>>>>> bc873478dff7e481546a5007b9d26a7222a94c2f
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
<<<<<<< HEAD
=======

    /*
    public function someAdminStuff(Request $request)
    {
        $request->user()->authorizeRoles('manager');
        return view(‘some.view’);
    }
    */
>>>>>>> bc873478dff7e481546a5007b9d26a7222a94c2f
}
