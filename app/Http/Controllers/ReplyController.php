<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contact;
use App\Reply;

class ReplyController extends Controller
{
    public function index()
    {
        $auth = auth()->user()->id;
        $contacts = Contact::where('user_id', $auth)->get();

        return view('contact.index', compact('contacts'));
    }

    public function reply($id)
    {
        $contact = Contact::with('replies')->find($id);

        return view('contact.reply', compact('contact'));
    }
}
