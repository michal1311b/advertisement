<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contact;
use App\Http\Service\Mailer;

class ContactController extends Controller
{
    public function store(Request $request)
    {
        $contact = Contact::create($request->all());
        $send = Mailer::sendEmail(
            $contact::with('user')
            ->find($request['user_id'])
        );

        return back();
    }
}
