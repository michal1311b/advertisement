<?php

namespace App\Http\Controllers;

use App\User;
use App\Experience;
use Illuminate\Http\Request;
use App\Http\Requests\Experience\StoreRequest;

class ExperienceController extends Controller
{
    public function store(User $user, StoreRequest $request)
    {
        $data = [];
        $data = array_merge($data, $request->all());
        $data['user_id'] = $user->id;
        $experience = Experience::create($data);

        session()->flash('success',  __('Your experience was successfully stored.'));

        return back();
    }

    public function delete(Experience $experience)
    {
        if($experience->delete())
        {
            session()->flash('success',  __('Your experience was successfully deleted.'));

            return back();
        }
    }
}
