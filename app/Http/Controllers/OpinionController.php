<?php

namespace App\Http\Controllers;

use App\Http\Requests\Opinion\StoreRequest;
use App\Opinion;
use Illuminate\Support\Facades\Auth;

class OpinionController extends Controller
{
    public function store(StoreRequest $request, $id)
    {
        Opinion::create([
            'user_id' => Auth::id(),
            'opinionable_id' => $id,
            'opinionable_type' => $request->get('type') == 1 ? 'App\Advertisement' : 'App\ForeignOffer',
            'content' => $request->get('content')
        ]);

        session()->flash('success',  trans('crudInfos.comment-create-success'));

        return back();
    }

    public function delete($id)
    {
        $opinion = Opinion::findOrFail($id);

        if($opinion->delete())
        {
            session()->flash('success',  trans('crudInfos.delete-comment'));

            return back();
        }
    }
}
