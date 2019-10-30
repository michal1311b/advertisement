<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\Course\StoreRequest;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\User;
use App\Course;

class CourseController extends Controller
{
    public function store(User $user, StoreRequest $request)
    {
        DB::beginTransaction();

        try {
            $data = [];
            $data = array_merge($data, $request->all());
            $data['user_id'] = $user->id;
            $experience = Course::create($data);

            DB::commit();

            session()->flash('success',  __('Your course was successfully stored.'));

            return back();
        } catch(\Exception $e) {
            Log::info($e);
            DB::rollback();

            session()->flash('danger',  __('Something wrong try again'));

            return back()->withInput($request->all());
        }

    }

    public function delete(Course $course)
    {
        if($course->delete())
        {
            session()->flash('success',  __('Your course was successfully deleted.'));

            return back();
        }
    }

    public function update(Course $course, Request $request)
    {
        DB::beginTransaction();

        try {
            $course->update($request->all());

            DB::commit();

            session()->flash('success',  __('Your course was successfully updated.'));

            return back();
        } catch(\Exception $e) {
            Log::info($e);
            DB::rollback();

            session()->flash('danger',  __('Something wrong try again'));

            return back()->withInput($request->all());
        }
    }
}
