<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use App\Pin;
use App\Http\Requests\Admin\Post\StoreRequest;
use Illuminate\Support\Str;

class PostController extends Controller
{
   public function create() 
   {
       $categories = Category::all();

       return view('admin.posts.create', compact('categories'));
   }

   /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {
        $now = \Carbon\Carbon::now();
        $fileData = $request->file('cover');
        $cover = "http://{$_SERVER['HTTP_HOST']}/" . $fileData->store('/posts' . '/' . Str::random(6) . $now->format('Y-m-d-hh-mm-ss') . Str::random(6), 'public');

        $post = Post::create([
            'title' => $request->get('title'),
            'body' => $request->get('body'),
            'category_id' => $request->get('category_id'),
            'user_id' => auth()->user()->id,
            'cover' => $cover
        ]);

        if(isset($request['pins'])) {
            $pins = explode(",", $request['pins'][0]);
            foreach($pins as $k => $pin) {
                if(is_numeric($k)) {
                    $pinData = new Pin();
                    $pinData->name = trim($pin);
                    $pinData->post_id = $post->id;
                    $pinData->slug = $pinData::getUniqueSlug($pin);
                    $post->pins()->save($pinData);
                }
            }
        }

        session()->flash('success','Post created successfully!');

        return view('admin.posts.create',[
            'categories' => Category::paginate()
        ]);
    }
}
