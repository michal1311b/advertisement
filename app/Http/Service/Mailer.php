<?php

namespace App\Http\Service;
use App\Mail\QuestionMail;

class Mailer
{
    public static function sendEmail($input)
    {
        switch ($input['emailType'])
        {
            case 'QuestionMail':
                \Mail::to($input->user->email)
                ->send(new QuestionMail($input));
                break;

            default:
                echo "Żadna z powyższych";
                break;
        }
    }
}