<?php

namespace App\Http\Controllers;

use App\User;
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
}
