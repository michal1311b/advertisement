<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Advertisement;
use Auth;
use Image;
use Illuminate\Support\Facades\Hash;
use App\Notifications\UserFollowed;
use App\Specialization;
use App\Experience;
use App\Http\Requests\User\UploadRequest;
use App\Language;
use App\UserLanguage;

class UserController extends Controller
{
    public function edit(User $user)
    {
        $editUser = Auth::user()->load(['doctor', 'profile', 'specializations', 'experiences', 'courses']);
        $user = Auth::user();
        $user->checkAuthorization($editUser->id, $user->id);
        $specializations = Specialization::all();
        $languages = Language::all();
        $userLanguages = UserLanguage::where('user_id', $editUser->id)->with('language')->get();

        return view('user.edit', compact(['editUser', 'specializations', 'languages', 'userLanguages']));
    }

    public function update(UploadRequest $request, User $user)
    {
        if($request->hasFile('avatar')){
    		$avatar = $request->file('avatar');
    		$filename = time() . '.' . $avatar->getClientOriginalExtension();
    		Image::make($avatar)->resize(300, 300)->save( public_path('/uploads/avatars/' . $filename ) );
    		
    		$user->avatar = '/uploads/avatars/' . $filename;
        }

        $user->name = $request->name;
        $user->password = ($request->password === null) ? $user->password : Hash::make($request->password);
        $user->save();
        $profile = $user->profile()->get();
        $profile[0]->update($request->all());

        if(isset($request->specializations))
        {
            $user->specializations()->sync($request->specializations);
        }

        session()->flash('success',  __('Your profile was succesfully updated.'));

        return back();
    }

    public function getUserAdvertisements()
    {
        $user = Auth::user();
        $advertisements = Advertisement::with(['state', 'galleries'])
        ->where('user_id', '=', $user->id)
        ->paginate(5);

        return view('user.advertisements', compact('advertisements'));
    }

    public function showUserAdvertisement($slug)
    {
        $user = Auth::user();
        $advertisement = Advertisement::whereSlug($slug)
        ->with([
            'galleries',
            'user',
            'work',
            'state',
            'tags'
        ])
        ->where('user_id', '=', $user->id)
        ->firstOrFail();
        
        return view('user.advertisement-show', compact('advertisement'));
    }

    public function follow(User $user)
    {
        $follower = auth()->user();
        if ($follower->id == $user->id) {
            return back()->withError("You can't follow yourself");
        }
        if(!$follower->isFollowing($user->id)) {
            $follower->follow($user->id);

            // sending a notification
            $user->notify(new UserFollowed($follower));

            return back()->withSuccess("You are now friends with {$user->name}");
        }
        return back()->withError("You are already following {$user->name}");
    }

    public function unfollow(User $user)
    {
        $follower = auth()->user();
        if($follower->isFollowing($user->id)) {
            $follower->unfollow($user->id);
            return back()->withSuccess("You are no longer friends with {$user->name}");
        }
        return back()->withError("You are not following {$user->name}");
    }
    
    public function notifications()
    {
        return auth()->user()->unreadNotifications()->limit(5)->get()->toArray();
    }

    public function read(Request $request)
    {
        if($request->has('read')) {
            $notification = $request->user()->notifications()->where('id', $request->read)->first();
            if($notification) {
                $notification->markAsRead();
            }
        }

        return back();
    }
}
