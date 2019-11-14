<?php

namespace App\Http\Controllers;

use App\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public function index()
    {
        $companies = new Collection();
        $users =  User::with(['roles', 'profile'])
        ->withCount(['advertisements' => function($query) {
            $query->where('created_at', '>', Carbon::now()->subDays(30));
        }])
        ->orderBy('advertisements_count', 'desc')
        ->get();
        foreach($users as $user)
        {
            if($user->hasRole('company'))
            {
                $companies->push($user);
            }
        }
        
        return view('company.index', compact('companies'));
    }

    public function show(User $user)
    {
        $user->load([
            'profile',
            'advertisements' => function($query) {
                $query->paginate();
                $query->where('created_at', '>', Carbon::now()->subDays(30));
            },
            'advertisements.specialization',
            'advertisements.location',
            'advertisements.galleries']);
        
        return view('company.show', compact('user'));
    }
}
