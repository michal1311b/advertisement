<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Advertisement;
use Auth;
use Image;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function edit($id)
    {
        $editUser = User::find($id);
        $user = Auth::user();
        $user->checkAuthorization($editUser->id, $user->id);

        return view('user.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $user = Auth::user();
        if($request->hasFile('avatar')){
    		$avatar = $request->file('avatar');
    		$filename = time() . '.' . $avatar->getClientOriginalExtension();
    		Image::make($avatar)->resize(300, 300)->save( public_path('/uploads/avatars/' . $filename ) );
    		
    		$user->avatar = '/uploads/avatars/' . $filename;
        }

        $user->name = $request->name;
        $user->password = ($request->password === null) ? $user->password : Hash::make($request->password);

        $user->save();

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
}
