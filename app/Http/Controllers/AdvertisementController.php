<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Advertisement;
use App\Currency;
use App\Specialization;
use App\Work;
use App\User;
use App\Location;
use App\State;
use App\Gallery;
use App\Http\Requests\Advertisement\StoreRequest;
use App\Http\Requests\Advertisement\UploadRequest;
use App\Jobs\SendEmailJob;
use App\Http\Service\Visit;
use App\Settlement;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class AdvertisementController extends Controller
{
    public function index()
    {
        $advertisements = Advertisement::with(['state', 'galleries', 'location'])
        ->where('expired_at', '>', Carbon::now())->paginate(5);
        $locations = Location::get(['id', 'city']);
        $specializations = Specialization::all();
        $expirateDate = Carbon::now()->subDays(30);

        return view('advertisement.index', compact(['advertisements', 'locations', 'specializations', 'expirateDate']));
    }
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

    public function store(StoreRequest $request)
    {
        Log::info($request->all());
        DB::beginTransaction();

        try {
            Advertisement::create($request->all());

            DB::commit();

            return response()->json([
                'status' => 201,
                'message' => trans('sentence.offer-create-success')
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

    public function show($id, $slug)
    {
        $advertisement = Advertisement::whereSlug($slug)
            ->with([
                'galleries',
                'user',
                'work',
                'state',
                'tags',
                'specialization'
            ])
            ->firstOrFail();

        $user = Auth::user();
        
        if($user->doctor === null)
        {
            Visit::storeVisit($user->id, $advertisement->id);
        } else {
            Visit::storeVisit($user->id, $advertisement->id, true);
        }

        $similars = Advertisement::with(['state', 'galleries', 'location'])
        ->where('specialization_id', $advertisement->specialization_id)
        ->where('settlement_id', $advertisement->settlement_id)
        ->where('min_salary', '>=', $advertisement->min_salary)
        ->where('id', '!=', $advertisement->id)
        ->where('expired_at', '>', Carbon::now())
        ->paginate(3);

        return view('advertisement.show', compact(['advertisement', 'similars']));
    }

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

        return view('advertisement.edit', compact(['advertisement', 'works', 'states', 'tags', 'locations', 'specializations', 'currencies', 'settlements']));
    }

    public function deletePhoto($id)
    {
        $gallery = Gallery::findOrFail($id);
        unlink(public_path($gallery->path));
        $gallery->delete();

        session()->flash('success', trans('sentence.delete-photo'));

        return back();
    }

    public function update(UploadRequest $request, $id)
    {
        DB::beginTransaction();

        try {
            $advertisement = Advertisement::findOrFail($id);
            $advertisement->update($request->all());

            DB::commit();

            session()->flash('success', trans('sentence.offer-update-success'));

            return back();
        } catch (\Exception $e) {
            Log::info($e);
            DB::rollback();

            session()->flash('error',  trans('sentence.error-message'));

            return back()->withInput($request->all());
        }
    }

    public function delete($id)
    {
        $advertisement = Advertisement::with(['tags', 'galleries'])->findOrFail($id);
        
        if ($advertisement->delete()) {
            session()->flash('success',  trans('sentence.delete-offer'));

            return back();
        }
    }

    public function sendEmail()
    {
        $emailJob = (new SendEmailJob())->delay(Carbon::now()->addSeconds(5));
        dispatch($emailJob);

        echo 'email sent';
    }

    public function search(Request $request)
    {
        $range = explode(',', $request->input('range'));

        if ($request->input('location_id') !== null) {
            $location = Location::find($request->input('location_id'));
            $advertisements = Advertisement::where('location_id', $location->id)
                ->where('expired_at', '>', Carbon::now())
                ->where('min_salary', '>=', $range[0])
                ->where('max_salary', '<=', $range[1]);
        }

        if ($request->input('specialization_id') !== null) {
            $specialization = Specialization::find($request->input('specialization_id'));
            $advertisements = Advertisement::where('specialization_id', $specialization->id)
                ->where('expired_at', '>', Carbon::now())
                ->where('min_salary', '>=', $range[0])
                ->where('max_salary', '<=', $range[1]);
        }

        if (($request->input('location_id') !== null) && ($request->input('specialization_id') !== null)) {
            $specialization = Specialization::find($request->input('specialization_id'));
            $location = Location::find($request->input('location_id'));
            $advertisements = Advertisement::where('specialization_id', $specialization->id)
                ->where('expired_at', '>', Carbon::now())
                ->where('location_id', $location->id)
                ->where('min_salary', '>=', $range[0])
                ->where('max_salary', '<=', $range[1]);
        }

        if (($request->input('location_id') === null) && ($request->input('specialization_id') === null)) {
            $advertisements = Advertisement::where('min_salary', '>=', ($range[0] ?? 0))
                ->where('max_salary', '<=', ($range[1] ?? 1000))
                ->where('expired_at', '>', Carbon::now());
        }

        $locations = Location::all();
        $specializations = Specialization::all();

        $advertisements = $advertisements->paginate();

        return view('advertisement.index', compact(['advertisements', 'locations', 'specializations']));
    }
}
