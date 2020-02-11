<?php

namespace App\Http\Controllers;

use App\Currency;
use App\ForeignOffer;
use App\Http\Requests\Foreign\StoreRequest;
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
        $advertisement = ForeignOffer::whereSlug($slug)
            ->where('id', $id)
            ->with([
                'user',
                'work',
                'specialization'
            ])
            ->firstOrFail();

        $user = Auth::user();

        $similars = ForeignOffer::with(['specialization', 'settlement'])
        ->where('specialization_id', $advertisement->specialization_id)
        ->where('settlement_id', $advertisement->settlement_id)
        ->where('min_salary', '>=', $advertisement->min_salary)
        ->where('id', '!=', $advertisement->id)
        ->where('expired_at', '>', Carbon::now())
        ->paginate(3);

        return view('foreign.show', compact(['advertisement', 'similars']));
    }

    public function delete($id)
    {
        $foreign = ForeignOffer::findOrFail($id);
        
        if ($foreign->delete()) {
            session()->flash('success',  trans('sentence.delete-offer'));

            return back();
        }
    }
}
