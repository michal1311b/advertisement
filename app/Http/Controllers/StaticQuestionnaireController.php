<?php

namespace App\Http\Controllers;

use App\Http\Requests\StaticQuestionnaire;
use App\Specialization;
use App\StaticQuestionnaire as AppStaticQuestionnaire;

class StaticQuestionnaireController extends Controller
{
    public function show()
    {
        $specializations = Specialization::all();

        return view('questionnaire.static.show', compact('specializations'));
    }

    public function store(StaticQuestionnaire $request)
    {
        AppStaticQuestionnaire::create($request->all());

        session()->flash('success', trans('questionnaire.questionnaire-thanks'));

        return back();
    }
}
