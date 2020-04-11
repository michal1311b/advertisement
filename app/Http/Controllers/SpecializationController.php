<?php

namespace App\Http\Controllers;

use App\Advertisement;
use App\Currency;
use App\ForeignOffer;
use App\Location;
use App\Specialization;
use App\State;
use Carbon\Carbon;
use Illuminate\Http\Request;

class SpecializationController extends Controller
{
    public function indexFromForeign(Specialization $specialization, $slug)
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
        ->where('specialization_id', $specialization->id)
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

    public function indexFromPoland(Specialization $specialization, $slug)
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
        ->where('specialization_id', $specialization->id)
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
}
