<?php

namespace App\Http\Controllers;

use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.users.index',[
            'users' => User::paginate()
        ]);
    }

    public function block(User $user)
    {
        if($user->hasRole('admin'))
        {
            session()->flash('error', trans('sentence.dont-block-admin'));
            return back();
        }

        $user->banned_until = Carbon::now()->addDays(14);
        $user->save();

        session()->flash('success', trans('crudInfos.user-ban-success'));

        return back();
    }

    public function unblock(User $user)
    {
        $user->update([
            'banned_until' => null
        ]);

        session()->flash('success', trans('crudInfos.user-unban-success'));

        return back();
    }
}
