<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserLanguageRequest;
use App\Language;
use Illuminate\Http\Request;
use App\User;
use App\UserLanguage;

class UserLanguageController extends Controller
{
    public function store(User $user, UserLanguageRequest $request)
    {
        $newLanguage = UserLanguage::where('lang_key', $request->lang_key)
        ->where('user_id', $user->id)->first();

        if($newLanguage) {
            session()->flash('error', trans('sentence.language-exists'));
        
            return back();
        }

        UserLanguage::create([
            'user_id' => $user->id,
            'lang_key' => $request->lang_key,
            'level' => $request->level
        ]);

        session()->flash('success',  trans('sentence.language-add-success'));
        
        return back();
    }

    public function update(Language $language, $id, Request $request)
    {
        $newLanguage = UserLanguage::where('lang_key', $request->lang_key)
        ->where('level', $request->level)
        ->where('user_id', $id)->first();

        if($newLanguage) {
            session()->flash('error',  trans('sentence.language-exists'));
        
            return back();
        }

        $userLanguage = UserLanguage::where('lang_key', $language->lang_key)
        ->where('user_id', $id)->first();
        
        $userLanguage->lang_key = $request->lang_key;
        $userLanguage->level = $request->level;
        $userLanguage->save();

        session()->flash('success',  trans('sentence.language-update-success'));
        
        return back();
    }

    public function delete($id)
    {
        $userLanguage = UserLanguage::findOrFail($id);
        if ($userLanguage->delete()) {
            session()->flash('success',  trans('sentence.delete-language'));

            return back();
        }
    }
}
