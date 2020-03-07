<?php

namespace App\Mail;

use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class OpinionMail extends Mailable
{
    public $user, $type;
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(User $user, $type)
    {
        $this->user = $user;
        $this->type = $type;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('EmployMed.eu - Prosimy o wyrażenie opinii o protalu')
        ->from('contactemploymed@gmail.com')
        ->view('emails.opinion')
        ->with([
            'user' => $this->user,
            'type' => $this->type
        ]);
    }
}
