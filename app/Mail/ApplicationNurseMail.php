<?php

namespace App\Mail;

use App\Nurse;
use App\Room;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ApplicationNurseMail extends Mailable
{
    use Queueable, SerializesModels;
    protected $nurse;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Nurse $nurse, Room $room)
    {
        $this->nurse = $nurse;
        $this->room = $room;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.application')
        ->with([
            'room' => $this->room->id
        ])
        ->attach(str_replace(config('app.url').'/', '', $this->nurse->cv));
    }
}
