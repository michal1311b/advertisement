<?php

namespace App\Http\Controllers;

use App\User;
use Carbon\Carbon;

class AdminController extends Controller
{
    /**
     * @queryParam $users list of users
     * @response view with params [
     * users
     * ] 
     */
    public function index()
    {
        return view('admin.users.index',[
            'users' => User::paginate()
        ]);
    }

    /**
     * @queryParam $user object of User's model
     * @response view 
     */
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

     /**
     * @queryParam $user object of User's model
     * @response view 
     */
    public function unblock(User $user)
    {
        $user->update([
            'banned_until' => null
        ]);

        session()->flash('success', trans('crudInfos.user-unban-success'));

        return back();
    }
}
