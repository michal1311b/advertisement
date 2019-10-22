<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Http\Requests\Comment\StoreRequest;
use Illuminate\Http\Request;
use Carbon\Carbon;

class CommentController extends Controller
{
    public function store(StoreRequest $request)
    {
        $now = Carbon::now();
        
        $comment = Comment::create([
            'post_id' => $request->get('post_id'),
            'author_id' => auth()->user()->id,
            'content' => $request->get('content'),
            'posted_at' => $now->toDateString()
        ]);

        session()->flash('success',  __('Comment created successfully!'));

        return back();
    }
}
