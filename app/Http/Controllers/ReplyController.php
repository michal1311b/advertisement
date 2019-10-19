<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contact;
use App\Reply;
use App\Http\Service\Mailer;

class ReplyController extends Controller
{
    public function index()
    {
        $auth = auth()->user()->id;
        $contacts = Contact::with('advertisement')->where('user_id', $auth)->get();

        return view('contact.index', compact('contacts'));
    }

    public function showReply($id)
    {
        $contact = Contact::with('replies')->find($id);

        return view('contact.reply', compact('contact'));
    }

    public function sendReply(Request $request)
    {
        $reply = Reply::create($request->all());

        $send = Mailer::sendEmail(
            $reply
        );

        return back();
    }
}