<?php

namespace App\Http\Controllers;

use App\Currency;
use App\ForeignOffer;
use App\Http\Requests\Foreign\StoreRequest;
use App\Http\Service\CurrencyExchange;
use App\Http\Service\Visit;
use App\Opinion;
use App\Settlement;
use App\Specialization;
use App\Work;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class ForeignOfferController extends Controller
{
    public function create(Request $request)
    {
        $request->user()->authorizeRoles(['company', 'admin']);

        $works = Work::all();
        $specializations = Specialization::all();
        $currencies = Currency::all();
        $settlements = Settlement::all();
        $user = auth()->user()->load('profile');

        return view('foreign.create', compact(
            'works',
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
            ForeignOffer::create($request->all());

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

    public function show($id, $slug)
    {
        $advertisement = ForeignOffer::whereSlug($slug)
            ->where('id', $id)
            ->with([
                'user',
                'work',
                'specialization'
            ])
            ->withCount('foreign_visits')
            ->firstOrFail();

        $user = Auth::user();
        
        if(isset($user->doctor) === false && $user) {
            Visit::storeForeignVisit($user->id, $advertisement->id);
        } else if(isset($user->doctor) !== false && $user) {
            Visit::storeForeignVisit($user->id, $advertisement->id, true);
        } else {
            Visit::storeForeignVisit(null, $advertisement->id, true);
        }

        $similars = ForeignOffer::with(['specialization', 'settlement'])
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
        ->where('opinionable_type', 'App\ForeignOffer')
        ->where('opinionable_id', $id)
        ->orderby('created_at', 'desc')
        ->paginate();

        $currencyExchanges = CurrencyExchange::convertSalary($advertisement->currency);

        return view('foreign.show', compact([
            'advertisement', 
            'similars',
            'opinions',
            'currencyExchanges'
        ]));
    }

    public function delete($id)
    {
        $foreign = ForeignOffer::findOrFail($id);
        
        if ($foreign->delete()) {
            session()->flash('success',  trans('crudInfos.delete-offer'));

            return back();
        }
    }

    public function edit(Request $request, $id)
    {
        $request->user()->authorizeRoles(['company', 'admin']);

        $foreign = ForeignOffer::find($id);
        $userId = $foreign->user_id;
        $request->user()->checkAuthorization($request->user()->id, $userId);

        $works = Work::all();
        $specializations = Specialization::all();
        $currencies = Currency::all();
        $settlements = Settlement::all();

        return view('foreign.edit', compact(['foreign', 'works', 'specializations', 'currencies', 'settlements']));
    }

    public function update(Request $request, $id)
    {
        \Log::info($request->all());
        DB::beginTransaction();

        try {
            $advertisement = ForeignOffer::findOrFail($id);
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

    public function index()
    {
        $foreigns = ForeignOffer::select(
            'id',
            'slug',
            'title', 
            'description', 
            'min_salary', 
            'max_salary', 
            'settlement_id',
            'specialization_id',
            'currency_id',
            'user_id',
            'street',
            'city',
            'latitude',
            'longitude',
            'expired_at'
            )
        ->with([
            'settlement' => function($query){
                $query->select('id', 'name');
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
        ->orderby('created_at', 'desc')
        ->paginate(8);

        $specializations = Specialization::all();
        $expirateDate = Carbon::now()->subDays(30);
        $currencies = Currency::get(['id', 'symbol']);

        return view('foreign.index', compact([
            'foreigns', 
            'specializations', 
            'expirateDate', 
            'currencies'
        ]));
    }

    public function search(Request $request)
    {
        $range = explode(',', $request->input('range'));
        $currency = Currency::find($request->input('currency_id'));

        if ($request->input('specialization_id') !== null) {
            $specialization = Specialization::find($request->input('specialization_id'));
            
            $foreigns = ForeignOffer::where('specialization_id', $specialization->id)
                ->where('expired_at', '>', Carbon::now()->toDateString())
                ->where('min_salary', '>=', $range[0])
                ->where('max_salary', '<=', $range[1])
                ->where('currency_id', $currency->id)
                ->paginate();

            var_dump(4);
        }

        if (($request->input('specialization_id') === null)) {
            $foreigns = ForeignOffer::where('min_salary', '>=', $range[0])
                ->where('max_salary', '<=', $range[1])
                ->where('expired_at', '>=', Carbon::now()->toDateString())
                ->where('currency_id', $currency->id)
                ->paginate();
        }

        $specializations = Specialization::all();
        $currencies = Currency::get(['id', 'symbol']);

        return view('foreign.index', compact([
            'foreigns', 
            'specializations', 
            'currencies'
        ]));
    }

    public function extendAdvertisement($id)
    {
        $user_id = Auth::user()->id;
        $advertisement = ForeignOffer::find($id);

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
}
