<?php

namespace App\Http\Controllers;

use App\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

class CompanyController extends Controller
{
    public function index(Request $request)
    {
        $items = new Collection();
        $users =  User::with(['roles', 'profile'])
        ->withCount(['advertisements' => function($query) {
            $query->where('expired_at', '>', Carbon::now());
        }])
        ->withCount(['foreignOffers' => function($query) {
            $query->where('expired_at', '>', Carbon::now());
        }])
        ->orderBy('advertisements_count', 'desc')
        ->get();
        foreach($users as $user)
        {
            if($user->hasRole('company'))
            {
                $items->push($user);
            }
        }

        // Get current page form url e.x. &page=1
        $currentPage = LengthAwarePaginator::resolveCurrentPage();
 
        // Create a new Laravel collection from the array data
        $itemCollection = collect($items);
 
        // Define how many items we want to be visible in each page
        $perPage = 10;
 
        // Slice the collection to get the items to display in current page
        $currentPageItems = $itemCollection->slice(($currentPage * $perPage) - $perPage, $perPage)->all();
 
        // Create our paginator and pass it to the view
        $companies = new LengthAwarePaginator($currentPageItems , count($itemCollection), $perPage);
 
        // set url path for generted links
        $companies->setPath($request->url());
        
        return view('company.index', compact('companies'));
    }

    public function show(User $user)
    {
        $user->load([
            'profile',
            'departments',
            'advertisements' => function($query) {
                $query->paginate();
                $query->where('expired_at', '>', Carbon::now());
            },
            'foreignOffers' => function($query) {
                $query->paginate();
                $query->where('expired_at', '>', Carbon::now());
            },
            'foreignOffers.specialization',
            'advertisements.specialization',
            'advertisements.location',
            'advertisements.galleries']);
        
        return view('company.show', compact('user'));
    }
}
