<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class QuestionnaireController extends Controller
{
    public function create()
    {
        return view('questionnaire.create');
    }

    public function store(Request $request)
    {
        \Log::info($request->all());
    }
}
