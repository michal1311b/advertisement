<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Advertisement;
use App\Currency;
use App\Specialization;
use App\Work;
use App\Location;
use App\State;
use App\Gallery;
use App\Http\Requests\Advertisement\StoreRequest;
use App\Http\Service\CurrencyExchange;
use App\Jobs\SendEmailJob;
use App\Http\Service\Visit;
use App\Opinion;
use App\Poster;
use App\Settlement;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

/**
 * @group Advertisement management
 *
 * APIs for managing advertisements
 */
class AdvertisementController extends Controller
{
    /**
     * use trait CurrencyExchange
     */
    use CurrencyExchange;

    /**
     * @queryParam $advertisements list of advertisements 
     * from Poland with Location, Settlement, Specialization,
     * Currency, State, User, Gallery
     * @queryParam $locations list of locations, get [id, city]
     * @queryParam $specializations list of specializations
     * @queryParam $currencies list of currencies, get [id, symbol]
     * @queryParam $states list of states, get [id, name]
     * 
     * @response view with params [
     * advertisements,
     * locations,
     * specializations,
     * currencies,
     * states
     * ]
     */
    public function index()
    {
        $advertisements = Advertisement::select(
            'id',
            'slug',
            'title', 
            'description', 
            'min_salary', 
            'max_salary', 
            'location_id',
            'settlement_id',
            'specialization_id',
            'currency_id',
            'state_id',
            'user_id',
            'street',
            'latitude',
            'longitude',
            'expired_at'
            )
        ->with([
            'state' => function($query){
                $query->select('id', 'name');
            }, 
            'settlement' => function($query){
                $query->select('id', 'name');
            }, 
            'galleries',  
            'location' => function($query){
                $query->select('id', 'city');
            }, 
            'specialization' => function($query){
                $query->select('id', 'name');
            },
            'currency' => function($query){
                $query->select('id', 'symbol');
            },
            'user' => function($query){
                $query->with('profile');
            }])
        ->where('expired_at', '>', Carbon::now())
        ->orderby('specialization_id', 'desc')
        ->orderby('created_at', 'desc')
        ->paginate();

        $locations = Location::get(['id', 'city']);
        $specializations = Specialization::all();
        $currencies = Currency::get(['id', 'symbol']);
        $states = State::get(['id', 'name']);

        return view('advertisement.index', compact([
            'advertisements', 
            'locations', 
            'specializations', 
            'currencies',
            'states'
        ]));
    }

    /**
	 * Create a advertisement
     * @urlParam $request
     * @queryParam $works list of works
     * @queryParam $settlements list of settlements
     * @queryParam $locations list of locations, get [id, city]
     * @queryParam $specializations list of specializations
     * @queryParam $currencies list of currencies, get [id, symbol]
     * @queryParam $states list of states, get [id, name]
     * @queryParam $user get auth user with loaded profile
     * 
     * @response view with params [
     * works,
     * states,
     * locations,
     * specializations,
     * currencies,
     * settlements,
     * user
     * ]
	 */
    public function create(Request $request)
    {
        $request->user()->authorizeRoles(['company', 'admin']);

        $works = Work::all();
        $states = State::all();
        $locations = Location::get(['id', 'city']);
        $specializations = Specialization::all();
        $currencies = Currency::all();
        $settlements = Settlement::all();
        $user = auth()->user()->load('profile');

        return view('advertisement.create', compact(
            'works',
            'states',
            'locations',
            'specializations',
            'currencies',
            'settlements',
            'user'
        ));
    }

    /**
	 * Store a advertisement
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
        Log::info($request->all());
        DB::beginTransaction();

        try {
            Advertisement::create($request->all());

            DB::commit();

            return response()->json([
                'status' => 201,
                'message' => trans('crudInfos.offer-create-success')
            ]);
        } catch (\Exception $e) {
            Log::info($e);
            DB::rollback();

            return response()->json([
                'status' => $e->getCode(),
                'message' => $e->getMessage()
            ]);
        }
    }

     /**
	 * Show an advertisement
     * @urlParam $id required The ID of the advertisement
     * @urlParam $slug required The slug of the advertisement
     * @queryParam $advertisement current advertisement depends on slug and id
     * with galleries, user, work, state, tags, specialization, counted visits
     * @queryParam $similars list of advertisements depends on specialization_id,
     * settlement_id, min_salary, id, expired_at
     * @queryParam $currencyExchanges counted currencies depend on advetisement's currency
     * @queryParam $opinions list of opinions with user and user's profile data order by created_at
     * 
     * @response view with params [
     * advertisement, 
     * similars, 
     * opinions, 
     * currencyExchanges
     * ]
     */
    public function show($id, $slug)
    {
        $advertisement = Advertisement::whereSlug($slug)
            ->where('id', $id)
            ->with([
                'galleries',
                'user',
                'work',
                'state',
                'tags',
                'specialization'
            ])
            ->withCount('visits')
            ->firstOrFail();

        $user = Auth::user();
        
        if(isset($user->doctor) === false && $user) {
            Visit::storeVisit($user->id, $advertisement->id);
        } else if(isset($user->doctor) !== false && $user) {
            Visit::storeVisit($user->id, $advertisement->id, true);
        } else {
            Visit::storeVisit(null, $advertisement->id, false);
        }

        $similars = Advertisement::with(['state', 'galleries', 'location'])
        ->where('specialization_id', $advertisement->specialization_id)
        ->where('settlement_id', $advertisement->settlement_id)
        ->where('min_salary', '>=', $advertisement->min_salary)
        ->where('id', '!=', $advertisement->id)
        ->where('expired_at', '>', Carbon::now())
        ->paginate(3);

        $opinions = Opinion::with([
            'user' => function($query){
                $query->select('id', 'name', 'avatar');
            }, 
            'user.profile'
        ])
        ->where('opinionable_type', 'App\Advertisement')
        ->where('opinionable_id', $id)
        ->orderby('created_at', 'desc')
        ->paginate(5);

        $currencyExchanges = CurrencyExchange::convertSalary($advertisement->currency);

        $poster = Poster::where('posterable_type', 'App\Advertisement')
        ->where('posterable_id', $id)
        ->first('path');
        
        return view('advertisement.show', compact([
            'advertisement', 
            'similars',
            'opinions',
            'currencyExchanges',
            'poster'
        ]));
    }

     /**
	 * Edit an advertisement
     * @urlParam $id required The ID of the advertisement
     * @urlParam $request required url data
     * @queryParam $advertisement current advertisement depends on slug and id
     * with galleries, user, work, state, tags, specialization, counted visits
     * @queryParam $works list of works
     * @queryParam $settlements list of settlements
     * @queryParam $locations list of locations, get [id, city]
     * @queryParam $specializations list of specializations
     * @queryParam $currencies list of currencies
     * @queryParam $states list of states
     * @queryParam $tags list of imploded tags
     * 
     * @response view with params [
     * works,
     * states,
     * locations,
     * specializations,
     * currencies,
     * settlements,
     * advertisement,
     * tags
     * ]
     */
    public function edit(Request $request, $id)
    {
        $request->user()->authorizeRoles(['company', 'admin']);

        $advertisement = Advertisement::with('tags')->find($id);
        $userId = $advertisement->user_id;
        $request->user()->checkAuthorization($request->user()->id, $userId);

        $works = Work::all();
        $states = State::all();
        $locations = Location::get(['id', 'city']);
        $specializations = Specialization::all();
        $currencies = Currency::all();
        $settlements = Settlement::all();

        $tags_array = [];
        foreach ($advertisement->tags as $tag) {
            $tags_array[] = $tag->name;
        }

        $tags = implode(",", $tags_array);

        return view('advertisement.edit', compact([
            'advertisement',
            'works',
            'states',
            'tags',
            'locations',
            'specializations',
            'currencies',
            'settlements'
        ]));
    }

    /**
	 * delete a Gallery's item
     * @urlParam $id required The ID of Gallery's item
     */
    public function deletePhoto($id)
    {
        $gallery = Gallery::findOrFail($id);
        unlink(public_path($gallery->path));
        $gallery->delete();

        session()->flash('success', trans('crudInfos.delete-photo'));

        return back();
    }

    /**
	 * update a advertisement
     * @urlParam $id required The ID of the advertisement
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
            $advertisement = Advertisement::findOrFail($id);
            $advertisement->update($request->all());

            DB::commit();

            return response()->json([
                'status' => 201,
                'message' => trans('crudInfos.offer-update-success')
            ]);
        } catch (\Exception $e) {
            Log::info($e);
            DB::rollback();

            return response()->json([
                'status' => $e->getCode(),
                'message' => $e->getMessage()
            ]);
        }
    }

    /**
	 * delete a Advertisement's item
     * @urlParam $id required The ID of Advertisement's item
     */
    public function delete($id)
    {
        $advertisement = Advertisement::with(['tags', 'galleries'])->findOrFail($id);
        
        if ($advertisement->delete()) {
            session()->flash('success',  trans('crudInfos.delete-offer'));

            return back();
        }
    }

    public function sendEmail()
    {
        $emailJob = (new SendEmailJob())->delay(Carbon::now()->addSeconds(5));
        dispatch($emailJob);

        echo 'email sent';
    }

    /**
	 * search an advertisements
     * @urlParam $request required url data
     * 
     * @queryParam $advertisements list of advertisements
     * @queryParam $locations list of locations
     * @queryParam $specializations list of specializations 
     * @queryParam $currencies list of currencies
     * @queryParam $states list of states
     * 
     * @response view with params [
     * works,
     * states,
     * locations,
     * specializations,
     * currencies,
     * settlements,
     * advertisement,
     * tags
     * ]
     */
    public function search(Request $request)
    {
        $range = explode(',', $request->input('range'));

        if ($request->input('location_id') !== null) {
            $location = Location::find($request->input('location_id'));
            $advertisements = Advertisement::where('location_id', $location->id)
                ->where('expired_at', '>', Carbon::now())
                ->where('min_salary', '>=', $range[0])
                ->where('max_salary', '<=', $range[1])
                ->where('currency_id', $request->currency_id);
        }

        if ($request->input('specialization_id') !== null) {
            $specialization = Specialization::find($request->input('specialization_id'));
            $advertisements = Advertisement::where('specialization_id', $specialization->id)
                ->where('expired_at', '>', Carbon::now())
                ->where('min_salary', '>=', $range[0])
                ->where('max_salary', '<=', $range[1])
                ->where('currency_id', $request->currency_id);
        }

        if ($request->input('state_id') !== null) {
            $state = State::find($request->input('state_id'));
            $advertisements = Advertisement::where('state_id', $state->id)
                ->where('expired_at', '>', Carbon::now())
                ->where('min_salary', '>=', $range[0])
                ->where('max_salary', '<=', $range[1])
                ->where('currency_id', $request->currency_id);
        }

        if (($request->input('location_id') !== null) 
            && ($request->input('specialization_id') !== null)) {
            $specialization = Specialization::find($request->input('specialization_id'));
            $location = Location::find($request->input('location_id'));
            
            $advertisements = Advertisement::where('specialization_id', $specialization->id)
                ->where('expired_at', '>', Carbon::now())
                ->where('location_id', $location->id)
                ->where('min_salary', '>=', $range[0])
                ->where('max_salary', '<=', $range[1])
                ->where('currency_id', $request->currency_id);
        }

        if (($request->input('specialization_id') !== null)
            && ($request->input('state_id') !== null)) {
            $specialization = Specialization::find($request->input('specialization_id'));
            $state = State::find($request->input('state_id'));

            $advertisements = Advertisement::where('specialization_id', $specialization->id)
                ->where('expired_at', '>', Carbon::now())
                ->where('state_id', $state->id)
                ->where('min_salary', '>=', $range[0])
                ->where('max_salary', '<=', $range[1])
                ->where('currency_id', $request->currency_id);
        }

        if (($request->input('location_id') !== null) 
            && ($request->input('state_id') !== null)) {
            $location = Location::find($request->input('location_id'));
            $state = State::find($request->input('state_id'));
            $advertisements = Advertisement::where('expired_at', '>', Carbon::now())
                ->where('location_id', $location->id)
                ->where('state_id', $state->id)
                ->where('min_salary', '>=', $range[0])
                ->where('max_salary', '<=', $range[1])
                ->where('currency_id', $request->currency_id);
        }

        if (($request->input('location_id') !== null) 
            && ($request->input('specialization_id') !== null)
            && ($request->input('state_id') !== null)) {
            $specialization = Specialization::find($request->input('specialization_id'));
            $location = Location::find($request->input('location_id'));
            $state = State::find($request->input('state_id'));
            $advertisements = Advertisement::where('specialization_id', $specialization->id)
                ->where('expired_at', '>', Carbon::now())
                ->where('location_id', $location->id)
                ->where('state_id', $state->id)
                ->where('min_salary', '>=', $range[0])
                ->where('max_salary', '<=', $range[1])
                ->where('currency_id', $request->currency_id);
        }

        if (($request->input('location_id') === null) 
            && ($request->input('specialization_id') === null)
            && ($request->input('state_id') === null)) {
            $advertisements = Advertisement::where('min_salary', '>=', ($range[0] ?? 0))
                ->where('max_salary', '<=', ($range[1] ?? 160000))
                ->where('currency_id', $request->currency_id)
                ->where('expired_at', '>', Carbon::now());
        }

        $locations = Location::all();
        $specializations = Specialization::all();
        $currencies = Currency::get(['id', 'symbol']);
        $states = State::all();

        $advertisements = $advertisements->paginate(25);

        return view('advertisement.index', compact([
            'advertisements', 
            'locations', 
            'specializations', 
            'currencies',
            'states'
        ]));
    }

     /**
	 * extend time of publishing an advertisement
     * @urlParam $id required to find advertisement
     * 
     * @queryParam $user_id authenticated user's ID
     * @queryParam $advertisement current advertisement
     */
    public function extendAdvertisement($id)
    {
        $user_id = Auth::user()->id;
        $advertisement = Advertisement::find($id);

        $now = new Carbon($advertisement->expired_at);
        
        $addOneMonth = $now->add(30, 'day')->toDateString();

        if($user_id !== $advertisement->user_id)
        {
            return back();
        } else {
            $advertisement->expired_at = $addOneMonth;
            $advertisement->reminder_send = 0;
            $advertisement->save();

            session()->flash('success',  trans('crudInfos.extend-offer-success'));

            return back();
        }
    }

    /**
     * Show list of archive's advertisements
     * @queryParam $advertisements list of advertisements 
     * from Poland with Location, Settlement, Specialization,
     * Currency, State, User, Gallery
     * @queryParam $locations list of locations, get [id, city]
     * @queryParam $specializations list of specializations
     * @queryParam $currencies list of currencies, get [id, symbol]
     * @queryParam $states list of states, get [id, name]
     */
    public function showArchive()
    {
        $advertisements = Advertisement::select(
            'id',
            'slug',
            'title', 
            'description', 
            'min_salary', 
            'max_salary', 
            'location_id',
            'settlement_id',
            'specialization_id',
            'currency_id',
            'state_id',
            'user_id',
            'street',
            'latitude',
            'longitude',
            'expired_at'
            )
        ->with([
            'state' => function($query){
                $query->select('id', 'name');
            }, 
            'settlement' => function($query){
                $query->select('id', 'name');
            }, 
            'galleries',  
            'location' => function($query){
                $query->select('id', 'city');
            }, 
            'specialization' => function($query){
                $query->select('id', 'name');
            },
            'currency' => function($query){
                $query->select('id', 'symbol');
            },
            'user' => function($query){
                $query->with('profile');
            }])
        ->where('expired_at', '<', Carbon::now())
        ->paginate(8);

        $locations = Location::get(['id', 'city']);
        $specializations = Specialization::all();
        $currencies = Currency::get(['id', 'symbol']);
        $states = State::get(['id', 'name']);

        return view('advertisement.archive', compact([
            'advertisements', 
            'locations', 
            'specializations', 
            'currencies',
            'states']));
    }
}
