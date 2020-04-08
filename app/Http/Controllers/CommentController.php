<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Http\Requests\Comment\StoreRequest;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class CommentController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  App\Http\Requests\Comment\StoreRequest $request
     * @return view
     */
    public function store(StoreRequest $request)
    {
        $now = Carbon::now();
        
        $comment = Comment::create([
            'post_id' => $request->get('post_id'),
            'author_id' => auth()->user()->id,
            'content' => $request->get('content'),
            'posted_at' => $now->toDateString()
        ]);

        session()->flash('success',  trans('crudInfos.comment-create-success'));

        return back();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Illuminate\Http\Request $request
     * @param  App\Comment $comment
     * @return view
     */
    public function update(Comment $comment, Request $request)
    {
        DB::beginTransaction();

        try {
            $comment->update($request->all());

            DB::commit();

            session()->flash('success',  trans('crudInfos.comment-update-success'));

            return back();
        } catch(\Exception $e) {
            Log::info($e);
            DB::rollback();

            session()->flash('error',  trans('sentence.error-message'));

            return back()->withInput($request->all());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Comment $comment
     * @return \Illuminate\Http\Response
     */
    public function delete(Comment $comment)
    {
        if($comment->delete())
        {
            session()->flash('success',  trans('crudInfos.delete-comment'));

            return back();
        }
    }
}
