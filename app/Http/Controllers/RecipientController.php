<?php

namespace App\Http\Controllers;

use App\Mailinglist;
use App\Recipient;
use App\Http\Requests\Recipient\StoreRequest;

class RecipientController extends Controller
{
    public function index()
    {
        $recipients = Recipient::with('mailinglist')->paginate();
        
        return view('admin.recipients.index', compact('recipients'));
    }

    public function create()
    {
        $mailinglists = Mailinglist::all();

        return view('admin.recipients.create', compact('mailinglists'));
    }

    public function store(StoreRequest $request)
    {
        $reciepient = Recipient::create($request->all());

        session()->flash('success', trans('crudInfos.recipient-create-success'));

        return back();
    }

    public function show(Recipient $recipient)
    {

    }

    public function edit(Recipient $recipient)
    {
        $mailinglists = Mailinglist::all();

        return view('admin.recipients.edit', compact(['recipient', 'mailinglists']));
    }

    public function destroy(Recipient $recipient)
    {
        if($recipient->delete())
        {
            session()->flash('success', trans('sentence.recipient-delete'));

            return back();
        }
    }

    public function update(StoreRequest $request, Recipient $recipient)
    {
        $recipient->update($request->all());

        session()->flash('success', trans('crudInfos.recipient-update-success'));

        return back();
    }
}
