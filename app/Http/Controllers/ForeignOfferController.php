<?php

namespace App\Http\Controllers;

use App\Currency;
use App\ForeignOffer;
use App\Http\Requests\Foreign\StoreRequest;
use App\Settlement;
use App\Specialization;
use App\Work;
use Illuminate\Http\Request;
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
}
