<?php

namespace App\Http\Controllers;

use App\CompanyCourse;
use App\Currency;
use App\Location;
use App\Participant;
use App\Specialization;
use App\State;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CompanyCourseController extends Controller
{
    public function index()
    {
        $courses = CompanyCourse::with([
            'user' => function($query){
                $query->with('profile');
            },
            'state' => function($query){
                $query->select('id', 'name');
            },
            'location' => function($query){
                $query->select('id', 'city');
            },
            'currency' => function($query){
                $query->select('id', 'symbol');
            },
            'specialization' => function($query){
                $query->select('id', 'name');
            }
        ])->paginate(8);

        return view('course.index', compact('courses'));
    }

    public function show($id, $slug)
    {
        $course = CompanyCourse::whereSlug($slug)
            ->where('id', $id)
            ->with([
                'user',
                'state',
                'currency',
                'specialization'
            ])
            ->firstOrFail();

        $similars = CompanyCourse::with([
            'user',
            'state',
            'currency',
            'state',
            'specialization'
        ])
        ->where('specialization_id', $course->specialization_id)
        ->where('price', '>=', $course->price)
        ->where('id', '!=', $course->id)
        ->where('state_id', $course->state_id)
        ->where('end_date', '>', Carbon::now())
        ->paginate(3);

        return view('course.show', compact(['course', 'similars']));
    }

    public function delete($id)
    {
        $course = CompanyCourse::findOrFail($id);
        
        if($course->delete())
        {
            session()->flash('success',  trans('sentence.delete-course'));

            return back();
        }
    }

    public function getCourseParticiapnts($id)
    {
        $participants = Participant::with('company_course')->where('company_course_id', $id)->paginate();
        $course = CompanyCourse::findOrFail($id);

        return view('course.participants', compact([
            'participants',
            'course'
        ]));
    }

    public function edit($id)
    {
        $course = CompanyCourse::with([
            'state' => function($query){
                $query->select('id', 'name');
            },
            'location' => function($query){
                $query->select('id', 'city');
            },
            'currency' => function($query){
                $query->select('id', 'symbol');
            },
            'specialization' => function($query){
                $query->select('id', 'name');
            }
        ])->findOrFail($id);

        $states = State::get(['id', 'name']);
        $locations = Location::get(['id', 'city']);
        $specializations = Specialization::get(['id', 'name']);
        $currencies = Currency::get(['id', 'symbol']);

        return view('course.edit', compact([
            'course',
            'states',
            'locations',
            'specializations',
            'currencies'
        ]));
    }

    public function update(Request $request, $id)
    {
        DB::beginTransaction();

        try {
            $course = CompanyCourse::findOrFail($id);
            \Log::info($course);
            $course->update($request->all());
            DB::commit();

            return response()->json([
                'status' => 201,
                'message' => trans('sentence.offer-update-success')
            ]);
        } catch (\Exception $e) {
            \Log::info($e);
            DB::rollback();

            session()->flash('error',  trans('sentence.error-message'));

            return back()->withInput($request->all());
        }
    }

    public function showCourseParticiapnt(CompanyCourse $course, $id)
    {
        $participant = Participant::find($id);

        return view('course.participant-show', compact(['course', 'participant']));
    }
}
