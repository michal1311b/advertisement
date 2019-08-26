<?php

namespace App\Http\Service;
use App\Mail\QuestionMail;
use App\Mail\AnswerMail;

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
            
            case 'AnswerMail':
                \Mail::to($input->email)
                ->send(new AnswerMail($input));
                break;

            default:
                echo "Żadna z powyższych";
                break;
        }
    }
}