<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public function index()
    {
        $companies = new Collection();
        $users =  User::with(['roles', 'profile'])
        ->withCount('advertisements')
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
            },
            'advertisements.specialization',
            'advertisements.location',
            'advertisements.galleries']);
        
        return view('company.show', compact('user'));
    }
}
