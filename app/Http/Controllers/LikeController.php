<?php

namespace App\Http\Controllers;

use App\Like;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LikeController extends Controller
{
    public function likeOffer($id)
    {
        // here you can check if product exists or is valid or whatever

        $this->handleLike('App\Advertisement', $id);
        return redirect()->back();
    }

    public function likeForeign($id)
    {
        // here you can check if product exists or is valid or whatever

        $this->handleLike('App\ForeignOffer', $id);
        return redirect()->back();
    }

    public function handleLike($type, $id)
    {
        $existing_like = Like::withTrashed()
        ->whereLikeableType($type)
        ->whereLikeableId($id)
        ->whereUserId(Auth::id())
        ->first();

        if (is_null($existing_like)) {
            Like::create([
                'user_id'       => Auth::id(),
                'likeable_id'   => $id,
                'likeable_type' => $type,
            ]);
        } else {
            if (is_null($existing_like->deleted_at)) {
                $existing_like->delete();
            } else {
                $existing_like->restore();
            }
        }
    }
}
