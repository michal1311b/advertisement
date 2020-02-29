<?php

namespace App\Http\Controllers;

use App\Advertisement;
use App\ForeignOffer;
use App\Mail\ReminderEmail;
use App\Mail\ReminderForeignEmail;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use jdavidbakr\MailTracker\Model\SentEmail;
use jdavidbakr\MailTracker\Model\SentEmailUrlClicked;

class EmailController extends Controller
{
    public function getIndex()
    {
        $users = User::all();
        session(['mail-tracker-index-page'=>request()->page]);
        $search = session('mail-tracker-index-search');
        $query = SentEmail::query();
        if($search) {
            $terms = explode(" ",$search);
            foreach($terms as $term) {
                $query->where(function($q) use($term) {
                    $q->where('sender','like','%'.$term.'%')
                        ->orWhere('recipient','like','%'.$term.'%')
                        ->orWhere('subject','like','%'.$term.'%');
                });
            }
        }
        $query->orderBy('created_at','desc');
        $emails = $query->paginate(config('mail-tracker.emails-per-page'));

        return \View('emailTrakingViews::index')->with('emails', $emails)->with('users', $users);
    }

    /**
     * Sent email search
     */
    public function postSearch(Request $request)
    {
        session(['mail-tracker-index-search'=>$request->search]);

        return redirect(route('mailTracker_Index'));
    }

    /**
     * Clear search
     */
    public function clearSearch()
    {
        session(['mail-tracker-index-search'=>null]);

        return redirect(route('mailTracker_Index'));
    }

    public function sendReminder()
    {
        $now = Carbon::now();
        $addOneWeek = $now->add(7, 'day')->toDateString();
        
        $advertisements = Advertisement::where('reminder_send', 0)
        ->where('expired_at', '=', $addOneWeek)->get();

        if(count($advertisements) > 0)
        {
            foreach($advertisements as $advertisement)
            {
                \Mail::to($advertisement->user->email)
                    ->send(new ReminderEmail());

                $advertisement->reminder_send = 1;
                $advertisement->save();
            }
        }
    }

    public function sendForeignReminder()
    {
        $now = Carbon::now();
        $addOneWeek = $now->add(7, 'day')->toDateString();
        
        $advertisements = ForeignOffer::where('reminder_send', 0)
        ->where('expired_at', '=', $addOneWeek)->get();

        if(count($advertisements) > 0)
        {
            foreach($advertisements as $advertisement)
            {
                \Mail::to($advertisement->user->email)
                    ->send(new ReminderForeignEmail());

                $advertisement->reminder_send = 1;
                $advertisement->save();
            }
        }
    }
}
