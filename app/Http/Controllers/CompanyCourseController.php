<?php

namespace App\Http\Controllers;

use App\CompanyCourse;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CompanyCourseController extends Controller
{
    public function index()
    {
        $courses = CompanyCourse::with([
            'user' => function($query){
                $query->with('profile');
            },
            'state' => function($query){
                $query->select('id', 'name');
            },
            'location' => function($query){
                $query->select('id', 'city');
            },
            'currency' => function($query){
                $query->select('id', 'symbol');
            },
            'specialization' => function($query){
                $query->select('id', 'name');
            }
        ])->paginate(8);

        return view('course.index', compact('courses'));
    }

    public function show($id, $slug)
    {
        $course = CompanyCourse::whereSlug($slug)
            ->where('id', $id)
            ->with([
                'user',
                'state',
                'currency',
                'specialization'
            ])
            ->firstOrFail();

        $similars = CompanyCourse::with([
            'user',
            'state',
            'currency',
            'state',
            'specialization'
        ])
        ->where('specialization_id', $course->specialization_id)
        ->where('price', '>=', $course->price)
        ->where('id', '!=', $course->id)
        ->where('state_id', $course->state_id)
        ->where('end_date', '>', Carbon::now())
        ->paginate(3);

        return view('course.show', compact(['course', 'similars']));
    }
}
