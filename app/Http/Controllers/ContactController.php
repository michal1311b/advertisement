<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contact;
use App\User;
use App\Http\Service\Mailer;
use App\Notifications\NewMessage;

class ContactController extends Controller
{
    public function store(Request $request)
    {
        $contact = Contact::create($request->all());
        
        $this->sendEmail($contact, $request['user_id']);

        $user = User::find($request['user_id']);

        $user->notify(new NewMessage($contact));

        return back();
    }

    private function sendEmail(Contact $contact, $userId)
    {
        Mailer::sendEmail(
            $contact::with('user')
            ->find($userId)
        );
    }
}
