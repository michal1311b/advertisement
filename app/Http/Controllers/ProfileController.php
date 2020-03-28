<?php

namespace App\Http\Controllers;

use App\Doctor;
use App\Http\Requests\User\CvRequest;
use App\Nurse;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ProfileController extends Controller
{
    public function uploadCV(CvRequest $request)
    {
        $user = auth()->user();

        if($user->doctor || $user->nurse)
        {
            $fileName = $user->id ."_CV_".time().'.'.request()->cv->getClientOriginalExtension();

            $path = $request->cv->storeAs('cv', $fileName);

            $isHttp = isset($_SERVER['HTTPS']) ? 'https://' : 'http://';

            if($user->hasRole('doctor'))
            {
                $user->doctor->cv = $isHttp . "{$_SERVER['HTTP_HOST']}/" . $path;
                $user->doctor->save();
            } else {
                $user->nurse->cv = $isHttp . "{$_SERVER['HTTP_HOST']}/" . $path;
                $user->nurse->save();
            }
            

            session()->flash('success', trans('crudInfos.upload-file-success'));

            return back();
        }
    }

    public function deleteCV(Doctor $doctor)
    {
        $this->unlinkCV($doctor->cv);

        $doctor->cv = null;
        $doctor->save();

        session()->flash('success', trans('crudInfos.delete-file-success'));

        return back();
    }

    public function deleteNurseCV(Nurse $nurse)
    {
        $this->unlinkCV($nurse->cv);

        $nurse->cv = null;
        $nurse->save();

        session()->flash('success', trans('crudInfos.delete-file-success'));

        return back();
    }

    protected function unlinkCV($url)
    {
        $path = str_replace(config('app.url'), '' , $url);
        unlink(public_path($path));
    }

    public function share(User $user, Request $request)
    {
        if($request->type === 'nurse')
        {
            if($user->nurse->share === 0) {
                $user->nurse->share = 1;
                $user->nurse->save();

                session()->flash('success', trans('crudInfos.share-profile-success'));
            } else {
                $user->nurse->share = 0;
                $user->nurse->save();

                session()->flash('success', trans('crudInfos.unshare-profile-success'));
            }
        } else {
            if($user->doctor->share === 0) {
                $user->doctor->share = 1;
                $user->doctor->save();

                session()->flash('success', trans('crudInfos.share-profile-success'));
            } else {
                $user->doctor->share = 0;
                $user->doctor->save();

                session()->flash('success', trans('crudInfos.unshare-profile-success'));
            }
        }

        return back();
    }
}
