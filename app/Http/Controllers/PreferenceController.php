<?php

namespace App\Http\Controllers;

use App\Preference;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class PreferenceController extends Controller
{
    public function update(Preference $preference, Request $request)
    {
        DB::beginTransaction();

        try {
            $preference->update($request->all());

            DB::commit();

            session()->flash('success',  __('Your preference was successfully updated.'));

            return back();
        } catch(\Exception $e) {
            Log::info($e);
            DB::rollback();

            session()->flash('danger',  __('Something wrong try again'));

            return back()->withInput($request->all());
        }
    }
}
