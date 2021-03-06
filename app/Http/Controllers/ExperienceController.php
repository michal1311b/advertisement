<?php

namespace App\Http\Controllers;

use App\User;
use App\Experience;
use Illuminate\Http\Request;
use App\Http\Requests\Experience\StoreRequest;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class ExperienceController extends Controller
{
    public function store(User $user, StoreRequest $request)
    {
        DB::beginTransaction();

        try {
            $data = [];
            $data = array_merge($data, $request->all());
            $data['user_id'] = $user->id;
            $experience = Experience::create($data);

            DB::commit();

            session()->flash('success',  trans('crudInfos.experience-store-success'));

            return back();
        } catch(\Exception $e) {
            Log::info($e);
            DB::rollback();

            session()->flash('error',  trans('sentence.error-message'));

            return back()->withInput($request->all());
        }

    }

    public function delete(Experience $experience)
    {
        if($experience->delete())
        {
            session()->flash('success',  trans('crudInfos.experience-delete-success'));

            return back();
        }
    }

    public function update(Experience $experience, Request $request)
    {
        DB::beginTransaction();

        try {
            $experience->update($request->all());

            DB::commit();

            session()->flash('success',  trans('crudInfos.experience-update-success'));

            return back();
        } catch(\Exception $e) {
            Log::info($e);
            DB::rollback();

            session()->flash('error',  trans('sentence.error-message'));

            return back()->withInput($request->all());
        }
    }
}
