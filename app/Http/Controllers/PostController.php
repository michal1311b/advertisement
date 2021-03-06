<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use App\Pin;
use App\Http\Requests\Admin\Post\StoreRequest;
use App\Http\Requests\Admin\Post\UpdateRequest;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

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
        DB::beginTransaction();

        try {
            $now = \Carbon\Carbon::now();
            $fileData = $request->file('cover');
            $isHttp = isset($_SERVER['HTTPS']) ? 'https://' : 'http://';
            $cover = $isHttp . "{$_SERVER['HTTP_HOST']}/" . $fileData->store('/posts' . '/' . Str::random(6) . $now->format('Y-m-d-hh-mm-ss') . Str::random(6), 'public');

            $post = Post::create([
                'title' => $request->get('title'),
                'body' => $request->get('body'),
                'category_id' => $request->get('category_id'),
                'is_published' => $request->get('is_published'),
                'user_id' => auth()->user()->id,
                'cover' => $cover,
                'slug' => Post::getUniqueSlug($request->get('title'))
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

            DB::commit();

            session()->flash('success', trans('crudInfos.post-create-success'));

            return view('admin.posts.create',[
                'categories' => Category::paginate()
            ]);
        } catch(\Exception $e) {
            Log::info($e);
            DB::rollback();

            session()->flash('error', trans('sentence.error-message'));

            return back()->withInput($request->all());
        }
    }

    public function index()
    {
        return view('admin.posts.index',[
            'posts' => Post::with('pins')->paginate()
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Post $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        if ($post->delete()) {
            session()->flash('success', trans('crudInfos.delete-post'));
        }

        return redirect()->route('posts.index');
    }

     /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $pins_array = [];
        foreach($post->pins as $pin) {
            $pins_array[] = $pin->name;
        }
        
        $pins = implode(",", $pins_array);

        return view('admin.posts.edit',[
            'categories' => Category::all(),
            'post' => $post->load('pins'),
            'pins' => $pins
        ]);
    }

    public function update(UpdateRequest $request, Post $post)
    {
        DB::beginTransaction();

        try {
            if($request->file('cover'))
            {
                $now = Carbon::now();
                $fileData = $request->cover;
                $isHttp = isset($_SERVER['HTTPS']) ? 'https://' : 'http://';
                $cover = $isHttp . "{$_SERVER['HTTP_HOST']}/" . $fileData->store('/posts' . '/' . Str::random(6) . $now->format('Y-m-d-hh-mm-ss') . Str::random(6), 'public');
                $post->cover = $cover;
                $post->save();
            }

            $post->slug = $post::getUniqueSlug($request->title);
            $post->save();

            if(isset($request['pins'])) {
                $pins = explode(",", $request['pins'][0]);
                foreach($post->pins as $pin)
                {
                    $pin->delete();
                }
                
                $pins = $request['pins'];
                if(is_array($pins))
                {
                    $explodedpin = explode(",", $pins[0]);
                    foreach($explodedpin as $k => $pin)
                    {
                        $pin = new Pin;
                        $pin->post_id = $post->id;
                        $pin->name = trim($explodedpin[$k]);
                        $pin->slug = $pin::getUniqueSlug($explodedpin[$k]);
                        $pin->save();
                    }
                }
            }

            $post->update($request->except(['cover']));

            DB::commit();

            session()->flash('success', trans('crudInfos.post-update-success'));

            return back();
        } catch(\Exception $e) {
            Log::info($e);
            DB::rollback();

            session()->flash('error', trans('sentence.error-message'));

            return back()->withInput($request->all());
        }
    }
}
