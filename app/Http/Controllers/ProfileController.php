<?php

namespace App\Http\Controllers;

use App\Doctor;
use App\Http\Requests\User\CvRequest;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ProfileController extends Controller
{
    public function uploadCV(CvRequest $request)
    {
        $user = auth()->user();

        if($user->doctor)
        {
            $fileName = $user->id ."_CV_".time().'.'.request()->cv->getClientOriginalExtension();

            $path = $request->cv->storeAs('cv', $fileName);

            $isHttp = isset($_SERVER['HTTPS']) ? 'https://' : 'http://';

            $user->doctor->cv = $isHttp . "{$_SERVER['HTTP_HOST']}/" . $path;
            $user->doctor->save();

            session()->flash('success', trans('sentence.upload-file-success'));

            return back();
        }
    }

    public function deleteCV(Doctor $doctor)
    {
        $path = str_replace(config('app.url'), '' , $doctor->cv);
        unlink(public_path($path));

        $doctor->cv = null;
        $doctor->save();

        session()->flash('success', trans('sentence.delete-file-success'));

        return back();
    }

    public function share(User $user)
    {
        if($user->doctor->share === 0)
        {
            $user->doctor->share = 1;
            $user->doctor->save();

            session()->flash('success', trans('sentence.share-profile-success'));
        } else {
            $user->doctor->share = 0;
            $user->doctor->save();

            session()->flash('success', trans('sentence.unshare-profile-success'));
        }

        return back();
    }
}
