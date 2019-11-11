<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\Language\StoreRequest;
use App\Language;
use App;


class LanguageController extends Controller
{
    public function create()
    {
        return view('languages.create');
    }

    public function store(StoreRequest $request)
    {
        $input = $request->all();
        $langiages = Language::all();
        $c = count($langiages)+1;
        
        $language = Language::create([
            'id' => $c,
            'name' => $input['name'],
            'local_name' => $input['local_name'],
            'lang_key' => $input['lang_key']
        ]);

        $language->update([
            'id' => $c
        ]);

        return back()->with('success', trans('sentence.language-create-success'));
    }

    public function index()
    {
        $languages = Language::all();

        return view('languages.index', compact('languages'));
    }

    public function edit(Language $language)
    {
        $language = Language::where('id', (int)$id)->get()[0];

        return view('languages.edit', compact('language'));
    }

    public function update(StoreRequest $request, $id)
    {
        $language = Language::find($id);
        $language->update($request->all());

        return back()->with('success', trans('sentence.language-update-success'));
    }

    /**
     * removing language
     *
     * @param Language $language
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(Language $language)
    {
        $language->delete();

        return back()->with('success', trans('sentence.delete-language'));
    }

    public function lang($locale)
    {
        App::setLocale($locale);
        session()->put('locale', $locale);
        return redirect()->back();
    }
}
