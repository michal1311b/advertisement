<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contact;

class ContactController extends Controller
{
    public function store(Request $request)
    {
        Contact::create($request->all());

        return back();
    }
}
