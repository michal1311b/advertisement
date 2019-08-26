<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contact;

class ReplyController extends Controller
{
    public function index()
    {
        $auth = auth()->user()->id;
        $contacts = Contact::where('user_id', $auth)->get();

        return view('contact.index', compact('contacts'));
    }
}
