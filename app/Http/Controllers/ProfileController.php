<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function uploadCV(Request $request)
    {
        $user = auth()->user();

        if($user->doctor)
        {
            $fileName = $user->id ."_CV_".time().'.'.request()->cv->getClientOriginalExtension();

            $path = $request->cv->storeAs('cv', $fileName);

            $user->doctor->cv = "http://{$_SERVER['HTTP_HOST']}/" . $path;
            $user->doctor->save();

            session()->flash('success', trans('sentence.upload-file-success'));

            return back();
        }
    }
}
