<?php

namespace App\Mail;

use App\Reply;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class AnswerMail extends Mailable
{
    use Queueable, SerializesModels;
    public $reply;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Reply $reply)
    {
        $this->reply = $reply;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Answer from question in advertisement')
                    ->from('mailer@wp.pl')
                    ->view('emails.answer')
                    ->with([
                        'message' => $this->reply->message
                    ]);
    }
}
