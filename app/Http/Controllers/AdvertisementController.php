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
use App\Jobs\SendEmailJob;
use App\Settlement;
use Carbon\Carbon;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class AdvertisementController extends Controller
{
    public function index()
    {
        $advertisements = Advertisement::with(['state', 'galleries', 'location'])
        ->where('created_at', '>', Carbon::now()->subDays(30))->paginate(5);
        $locations = Location::all();
        $specializations = Specialization::all();
        $expirateDate = Carbon::now()->subDays(30);

        return view('advertisement.index', compact(['advertisements', 'locations', 'specializations', 'expirateDate']));
    }
    public function create(Request $request)
    {
        $request->user()->authorizeRoles(['company', 'admin']);

        $works = Work::all();
        $states = State::all();
        $locations = Location::all();
        $specializations = Specialization::all();
        $currencies = Currency::all();
        $settlements = Settlement::all();

        return view('advertisement.create', compact('works', 'states', 'locations', 'specializations', 'currencies', 'settlements'));
    }

    public function store(StoreRequest $request)
    {
        DB::beginTransaction();

        try {
            Advertisement::create($request->all());

            DB::commit();

            session()->flash('success', __('Advertisement created successfully!'));

            return back();
        } catch (\Exception $e) {
            Log::info($e);
            DB::rollback();

            session()->flash('danger',  __('Something wrong try again'));

            return back()->withInput($request->all());
        }
    }

    public function show($slug)
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

        return view('advertisement.show', compact('advertisement'));
    }

    public function edit(Request $request, $id)
    {
        $request->user()->authorizeRoles(['company', 'admin']);

        $advertisement = Advertisement::with('tags')->find($id);
        $userId = $advertisement->user_id;
        $request->user()->checkAuthorization($request->user()->id, $userId);

        $works = Work::all();
        $states = State::all();
        $locations = Location::all();
        $specializations = Specialization::all();
        $currencies = Currency::all();

        $tags_array = [];
        foreach ($advertisement->tags as $tag) {
            $tags_array[] = $tag->name;
        }

        $tags = implode(",", $tags_array);

        return view('advertisement.edit', compact(['advertisement', 'works', 'states', 'tags', 'locations', 'specializations', 'currencies']));
    }

    public function deletePhoto($id)
    {
        $gallery = Gallery::findOrFail($id);
        $gallery->delete();

        session()->flash('success', __('Photo was deleted successfully!'));

        return back();
    }

    public function update(StoreRequest $request, $id)
    {
        DB::beginTransaction();

        try {
            $advertisement = Advertisement::findOrFail($id);
            $advertisement->update($request->all());

            DB::commit();

            session()->flash('success', __('Advertisement updated successfully!'));

            return back();
        } catch (\Exception $e) {
            Log::info($e);
            DB::rollback();

            session()->flash('danger',  __('Something wrong try again'));

            return back()->withInput($request->all());
        }
    }

    public function delete($id)
    {
        $advertisement = Advertisement::with(['tags', 'galleries'])->findOrFail($id);
        foreach ($advertisement->tags as $tag) {
            $tag->delete();
        }
        foreach ($advertisement->galleries as $gallery) {
            $gallery->delete();
        }
        if ($advertisement->delete()) {
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
                ->where('min_salary', '>=', $range[0])
                ->where('max_salary', '<=', $range[1]);
        }

        if ($request->input('specialization_id') !== null) {
            $specialization = Specialization::find($request->input('specialization_id'));
            $advertisements = Advertisement::where('specialization_id', $specialization->id)
                ->where('min_salary', '>=', $range[0])
                ->where('max_salary', '<=', $range[1]);
        }

        if (($request->input('location_id') !== null) && ($request->input('specialization_id') !== null)) {
            $specialization = Specialization::find($request->input('specialization_id'));
            $location = Location::find($request->input('location_id'));
            $advertisements = Advertisement::where('specialization_id', $specialization->id)
                ->where('location_id', $location->id)
                ->where('min_salary', '>=', $range[0])
                ->where('max_salary', '<=', $range[1]);
        }

        if (($request->input('location_id') === null) && ($request->input('specialization_id') === null)) {
            $advertisements = Advertisement::where('min_salary', '>=', ($range[0] ?? 0))
                ->where('max_salary', '<=', ($range[1] ?? 1000));
        }

        $locations = Location::all();
        $specializations = Specialization::all();

        $advertisements = $advertisements->paginate(5);

        return view('advertisement.index', compact(['advertisements', 'locations', 'specializations']));
    }
}
