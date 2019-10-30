<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Http\Requests\Comment\StoreRequest;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

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

    public function update(Comment $comment, Request $request)
    {
        DB::beginTransaction();

        try {
            $comment->update($request->all());

            DB::commit();

            session()->flash('success',  __('Your comment was successfully updated.'));

            return back();
        } catch(\Exception $e) {
            Log::info($e);
            DB::rollback();

            session()->flash('danger',  __('Something wrong try again'));

            return back()->withInput($request->all());
        }
    }

    public function delete(Comment $comment)
    {
        if($comment->delete())
        {
            session()->flash('success',  __('Your comment was successfully deleted.'));

            return back();
        }
    }
}
