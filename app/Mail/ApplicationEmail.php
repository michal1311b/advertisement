<?php

namespace App\Mail;

use App\Doctor;
use App\Room;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ApplicationEmail extends Mailable
{
    use Queueable, SerializesModels;
    protected $doctor;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Doctor $doctor, Room $room)
    {
        $this->doctor = $doctor;
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
        ->attach(str_replace(config('app.url').'/', '', $this->doctor->cv));
    }
}
