<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contact;
use App\User;
use App\Http\Service\Mailer;
use App\Notifications\NewMessage;
use App\Http\Requests\Contact\StoreRequest;
use Illuminate\Support\Str;
use Carbon\Carbon;

class ContactController extends Controller
{
    public function store(StoreRequest $request)
    {
        $now = \Carbon\Carbon::now();
        $fileData = $request->file('cv');
        $cv = "http://{$_SERVER['HTTP_HOST']}/" . $fileData->store('/cv' . '/' . Str::random(6) . $now->format('Y-m-d-hh-mm-ss') . Str::random(6), 'public');
        $data = [];
        $data = array_merge($data, $request->all());
        $data['cv'] = $cv;

        $contact = Contact::create($data);
        
        $this->sendEmail($contact, $request['user_id']);

        $user = User::find($request['user_id']);

        $user->notify(new NewMessage($contact));

        session()->flash('success', __('Message was send successfully!'));

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
