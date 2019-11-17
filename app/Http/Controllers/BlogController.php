<?php

namespace App\Http\Controllers;

use App\Category;
use App\Comment;
use Illuminate\Http\Request;
use App\Post;
use App\Specialization;

class BlogController extends Controller
{
    public function index()
    {
        $posts = Post::with('pins')->paginate();
        $categories = Category::all();

        return view('blog.index', compact(['posts', 'categories']));
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

        $specializations = Specialization::all();
        
        return view('blog.show', compact('post', 'comments', 'specializations'));
    }

    public function indexCategory(Category $category)
    {
        $posts = Post::where('category_id', $category->id)->paginate();
        $categories = Category::all();
        
        return view('blog.index', compact(['posts', 'categories', 'category']));
    }
}
