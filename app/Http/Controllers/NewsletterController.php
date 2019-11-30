<?php

namespace App\Http\Controllers;

use App\Mailinglist;
use App\Http\Requests\Newsletter\StoreRequest;
use App\Mail\NewsletterMail;
use App\Newsletter;
use App\Recipient;
use Illuminate\Support\Facades\Log;

class NewsletterController extends Controller
{
    public function create()
    {
        $mailinglists = Mailinglist::all();

        return view('admin.newsletters.create', compact('mailinglists'));
    }

    public function store(StoreRequest $request)
    {
        $newsletter = Newsletter::create([
            'mailinglist_id' => $request->get('mailinglist_id'),
            'title' => $request->get('title'),
            'subject' => $request->get('subject'),
            'message' => $request->get('message'),
            'sending_date' => $request->get('sending_date') . ' ' . $request->get('time'),
        ]);

        session()->flash('success', trans('sentence.newsletter-create-success'));

        return back();
    }

    public function index()
    {
        $newsletters = Newsletter::with('mailinglist')->paginate();

        return view('admin.newsletters.index', compact('newsletters'));
    }

    public function destroy(Newsletter $newsletter)
    {
        if ($newsletter->delete()) {
            session()->flash('success', trans('sentence.newsletter-delete'));

            return back();
        }
    }

    public function edit(Newsletter $newsletter)
    {
        return view('admin.newsletters.edit',[
            'newsletter' => $newsletter,
            'mailinglists' => Mailinglist::all()
        ]);
    }

    public function update(StoreRequest $request, Newsletter $newsletter)
    {
        $newsletter->update([
            'mailinglist_id' => $request->get('mailinglist_id'),
            'title' => $request->get('title'),
            'subject' => $request->get('subject'),
            'message' => $request->get('message'),
            'sending_date' => $request->get('sending_date') . ' ' . $request->get('time'),
        ]);

        session()->flash('success', trans('sentence.newsletter-update-success'));

        return back();
    }

    public function send()
    {
        $newsletter = Newsletter::where('sent', 0)
        ->whereDate('sending_date', '<', date('Y-m-d H:i:s'))
        ->first();

        if(isset($newsletter))
        {
            $newsletter = $newsletter->load(['mailinglist', 'mailinglist.recipients']);
            $mailinglist = $newsletter->mailinglist;
            
            $recipients_ids = $mailinglist->recipients->pluck('id');
            $recipients = Recipient::limit(250)->find($recipients_ids);
            
            if( !$recipients->count() || $recipients->count() < 250 )
            {
                $newsletter->sent = 1;
                $newsletter->save();
            }

            foreach( $recipients as $key => $recipient ){
                if(filter_var(trim($recipient->email), FILTER_VALIDATE_EMAIL)) {
                    $body = $newsletter->message;
                    $subject = $newsletter->subject;

                    \Mail::to($recipient->email)
                    ->send(new NewsletterMail($body, $subject));
                }
            }
        }
    }
}
