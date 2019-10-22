<?php

namespace App\Http\Controllers;

use App\Comment;
use Illuminate\Http\Request;
use App\Post;

class BlogController extends Controller
{
    public function index()
    {
        $posts = Post::with('pins')->paginate();

        return view('blog.index', compact('posts'));
    }

    public function show($slug)
    {
        $post = Post::whereSlug($slug)
        ->with([
            'category',
            'user',
            'pins',
            'comments'
        ])
        ->firstOrFail();

        $comments = Comment::where('post_id', $post->id)->with('author')->paginate(5);
        
        return view('blog.show', compact('post', 'comments'));
    }
}
