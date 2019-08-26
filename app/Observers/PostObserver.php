<?php

namespace App\Observers;

use App\Notifications\NewPost;
use App\Advertisement;

class PostObserver
{
    public function created(Advertisement $advertisement)
    {
        $user = $advertisement->user;

        if(isset($user->followers)) {
            foreach ($user->followers as $follower) {
                $follower->notify(new NewPost($user, $advertisement));
            }
        }
    }
}