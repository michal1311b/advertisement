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
use App\Http\Requests\CompanyCourse\StoreRequest;

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
            session()->flash('success',  trans('crudInfos.delete-course'));

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

    public function edit(Request $request, $id)
    {
        $request->user()->authorizeRoles(['company', 'admin']);

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

        $userId = $course->user_id;
        $request->user()->checkAuthorization($request->user()->id, $userId);

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
            \Log::info($request->all());
            $course->update($request->all());
            DB::commit();

            return response()->json([
                'status' => 201,
                'message' => trans('crudInfos.offer-update-success')
            ]);
        } catch (\Exception $e) {
            \Log::info($e);
            DB::rollback();

            return response()->json([
                'status' => $e->getCode(),
                'message' => $e->getMessage()
            ]);
        }
    }

    public function showCourseParticiapnt($course, $participant)
    {
        $course = CompanyCourse::find($course);
        $participant = Participant::find($participant);

        return view('course.participant-show', compact(['course', 'participant']));
    }

    public function create()
    {
        $states = State::get(['id', 'name']);
        $locations = Location::get(['id', 'city']);
        $specializations = Specialization::get(['id', 'name']);
        $currencies = Currency::get(['id', 'symbol']);

        return view('course.create', compact(['states', 'locations', 'specializations', 'currencies']));
    }

    public function store(StoreRequest $request)
    {
        DB::beginTransaction();

        try {
            \Log::info($request->all());
            CompanyCourse::create($request->all());
            
            DB::commit();

            return response()->json([
                'status' => 201,
                'message' => trans('crudInfos.offer-update-success')
            ]);
        } catch (\Exception $e) {
            \Log::info($e);
            DB::rollback();

            return response()->json([
                'status' => $e->getCode(),
                'message' => $e->getMessage()
            ]);
        }
    }

    public function deletePhoto($id)
    {
        $gallery = CompanyCourse::findOrFail($id);
        $path = parse_url($gallery->avatar);
        $image_path = public_path() . $path['path'];
        
        if(unlink($image_path))
        {
            $gallery->avatar = null;
            $gallery->save();
            
            session()->flash('success', trans('crudInfos.delete-photo'));

            return back();
        }
    }
}
