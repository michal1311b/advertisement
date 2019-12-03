<?php

namespace App\Mail;

use App\Advertisement;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendEmployeeAlert extends Mailable
{
    use Queueable, SerializesModels;
    public $advertisement;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Advertisement $advertisement)
    {
        $this->advertisement = $advertisement;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.alertemployee')
        ->with([
            'advertisement' => $this->advertisement,
            'slug' => $this->advertisement->slug
        ]);
    }
}
