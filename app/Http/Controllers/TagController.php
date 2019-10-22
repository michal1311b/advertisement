<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tag;
use App\Pin;
use App\Location;

class TagController extends Controller
{
    public function show($slug, $page = 1) {
        $advertisements = Tag::with('advertisement')->where('slug', $slug)->paginate(5);

        $locations = Location::all();
        
        if($advertisements) {
            return view('tag.index', compact('advertisements', 'locations'));
        }
    }
  
    public function showArticle( $tagSlug, $articleSlug ) {
        $tagRequest = N4d::getN4dTag($tagSlug);
        $tag = $tagRequest->tag;
        
        $article = N4d::getN4dTagArticle($tagSlug, $articleSlug);
        if($article && $tag){
          return view('n4d.tags.tagArticle', compact('article','tag'));
        }
    }

    public function showPost($slug, $page = 1) {
        $pins = Pin::with('post')->where('slug', $slug)->paginate(5);

        if($pins) {
            return view('blog.tag.index', compact('pins'));
        }
    }
}
