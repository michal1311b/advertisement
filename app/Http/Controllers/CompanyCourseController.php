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
     /**
     * @queryParam $courses list of courses 
     * with Location, Specialization, Currency, State, User
     * 
     * @response view with params [ courses ]
     */
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
        ])->paginate();

        return view('course.index', compact('courses'));
    }

    /**
	 * Show an course
     * @urlParam $id required The ID of the course
     * @urlParam $slug required The slug of the course
     * @queryParam $course current course depends on slug and id
     * with user, state, specialization, currency
     * @queryParam $similars list of courses depends on specialization_id,
     * state_id, price, id, end_date
     * 
     * @response view with params [ course, similars ]
     */
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

        return view('course.show', compact([
            'course', 'similars'
        ]));
    }

    /**
	 * delete a CompanyCourse
     * @urlParam $id required The ID of CompanyCourse
     */
    public function delete($id)
    {
        $course = CompanyCourse::findOrFail($id);
        
        if($course->delete())
        {
            session()->flash('success',  trans('crudInfos.delete-course'));

            return back();
        }
    }

     /**
	 * Show an course's participants list
     * @urlParam $id required The ID of the course
     * @queryParam $participants list of participants
     * @queryParam $course current course
     * 
     * @response view with params [ course, participants ]
     */
    public function getCourseParticiapnts($id)
    {
        $participants = Participant::with('company_course')->where('company_course_id', $id)->paginate();
        $course = CompanyCourse::findOrFail($id);

        return view('course.participants', compact([
            'participants',
            'course'
        ]));
    }

    /**
	 * Edit a company's course
     * @urlParam $id required The ID of company's course
     * @urlParam $request required url data
     * @queryParam course current course depends on id
     * with state, location, currency, specialization
     * @queryParam $locations list of locations, get [id, city]
     * @queryParam $specializations list of specializations
     * @queryParam $currencies list of currencies
     * @queryParam $states list of states
     * 
     * @response view with params [
     * course,
     * states,
     * locations,
     * specializations,
     * currencies
     * ]
     */
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

    /**
	 * update a company's course
     * @urlParam $id required The ID of the company's course
     * @urlParam $request required url data
     * 
     * @response 201 {
     *  "status" => 201,
     *  "message" => string
     * }
     * 
     * @response {
     *  "status" => "status error",
     *  "message" => string
     * }
     */
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

     /**
	 * Show an course's participant
     * @urlParam $id required The ID of the course
     * @queryParam $participant current participant
     * @queryParam $course current course
     * 
     * @response view with params [ course, participant ]
     */
    public function showCourseParticiapnt($course, $participant)
    {
        $course = CompanyCourse::find($course);
        $participant = Participant::find($participant);

        return view('course.participant-show', compact([
            'course', 'participant'
        ]));
    }

    /**
	 * Create a course
     * @queryParam $locations list of locations, get [id, city]
     * @queryParam $specializations list of specializations
     * @queryParam $currencies list of currencies, get [id, symbol]
     * @queryParam $states list of states, get [id, name]
     * 
     * @response view with params [
     * states,
     * locations,
     * specializations,
     * currencies
     * ]
	 */
    public function create()
    {
        $states = State::get(['id', 'name']);
        $locations = Location::get(['id', 'city']);
        $specializations = Specialization::get(['id', 'name']);
        $currencies = Currency::get(['id', 'symbol']);

        return view('course.create', compact([
            'states', 
            'locations', 
            'specializations', 
            'currencies'
        ]));
    }

    /**
	 * Store a course
     * @urlParam StoreRequest $request
     * 
     * @response 201 {
     *  "status" => 201,
     *  "message" => string
     * }
     * 
     * @response {
     *  "status" => "status error",
     *  "message" => string
     * }
	 */
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

    /**
	 * delete a course's avatar
     * @urlParam $id required The ID of Company's course
     */
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
