<?php

namespace App\Http\Controllers;

use App\Mailinglist;
use Illuminate\Http\Request;
use App\Http\Requests\Mailinglist\StoreRequest;

class MailinglistController extends Controller
{
    public function index()
    {
        return view('admin.mailinglist.index', [
            'mailinglists' => Mailinglist::paginate()
        ]);
    }

    public function create()
    {
        return view('admin.mailinglist.create');
    }

    public function store(StoreRequest $request)
    {
        Mailinglist::create($request->all());

        session()->flash('success', trans('sentence.mailinglist-create-success'));

        return back();
    }

    public function show(Mailinglist $mailinglist)
    {

    }

    public function destroy(Mailinglist $mailinglist)
    {
        if(count($mailinglist->load('newsletters')->newsletters) > 0)
        {
            $message = ['message.error' => trans('sentence.mailinglist-delete-block')];
            return redirect()->route('mailinglist.index')->with($message);
        }

        if(count($mailinglist->load('recipients')->recipients) > 0)
        {
            $message = ['message.error' => trans('sentence.mailinglist-delete-block')];
            return redirect()->route('mailinglist.index')->with($message);
        }
        
        if ($mailinglist->delete()) {
            $message = ['message.success' => trans('sentence.delete-mailinglist')];
        }

        return redirect()->route('mailinglists.index')->with($message);
    }

    public function edit(Mailinglist $mailinglist)
    {
        return view('admin.mailinglist.edit',[
            'mailinglist' => $mailinglist
        ]);
    }

    public function update(StoreRequest $request, Mailinglist $mailinglist)
    {
        $mailinglist->update($request->all());

        session()->flash('success', trans('sentence.mailinglist-update-success'));

        return back();
    }
}
