<?php

namespace App\Mail;

use App\Contact;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class QuestionMail extends Mailable
{
    use Queueable, SerializesModels;
    public $contact;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Contact $contact)
    {
        $this->contact = $contact;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject(trans('email.apply-email-title'))
                    ->from('mailer@wp.pl')
                    ->view('emails.question')
                    ->with([
                        'first_name' => $this->contact->first_name,
                        'phone' => $this->contact->phone,
                        'message' => $this->contact->message
                    ])
                    ->attach(str_replace(config('app.url').'/', '', $this->contact->cv));
    }
}
