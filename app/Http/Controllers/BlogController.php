<?php

namespace App\Http\Controllers;

use App\Category;
use App\Comment;
use App\Post;
use App\Specialization;

class BlogController extends Controller
{
     /**
     * @queryParam $posts list of posts with pins
     * @queryParam $categories list of categories
     * @response view with params [
     * posts,
     * categories
     * ] 
     */
    public function index()
    {
        $posts = Post::with('pins')->paginate();
        $categories = Category::all();

        return view('blog.index', compact([
            'posts',
            'categories'
        ]));
    }

    /**
	 * Show a post
     * @urlParam $slug required The slug of the post
     * @queryParam $post current post depends on slug
     * with category, user, pins, comments
     * @queryParam $comments list of comments
     * @queryParam $specializations list of specializations
     * 
     * @response view with params [
     * specializations, 
     * comments, 
     * post
     * ]
     */
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

    /**
     * @urlParam $category object of model Category
     * @queryParam $posts list of posts
     * @queryParam $categories list of categories
     * @response view with params [
     * posts,
     * categories
     * ] 
     */
    public function indexCategory(Category $category)
    {
        $posts = Post::where('category_id', $category->id)->paginate();
        $categories = Category::all();
        
        return view('blog.index', compact(['posts', 'categories', 'category']));
    }
}
