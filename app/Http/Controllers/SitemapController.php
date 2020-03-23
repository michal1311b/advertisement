<?php

namespace App\Http\Controllers;

use App\Advertisement;
use App\Category;
use App\ForeignOffer;
use App\Pin;
use App\Post;
use App\Tag;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Collection;

class SitemapController extends Controller
{
    public function index()
    {
        $advertisements = Advertisement::all()->first();
        $foreigns = ForeignOffer::all()->first();
        $posts = Post::all()->first();
        $tags = Tag::all()->first();
        $pins = Pin::all()->first();
        $categories = Category::all()->first();
        $companies = new Collection();
        $users = User::with(['roles', 'profile'])->get();
        foreach($users as $user)
        {
            if($user->hasRole('company'))
            {
                $companies->push($user);
            }
        }

        return response()->view('sitemap.index', [
            'advertisements' => $advertisements,
            'foreigns' => $foreigns,
            'posts' => $posts,
            'categories' => $categories,
            'pins' => $pins,
            'tags' => $tags,
            'categories' => $categories
        ])->header('Content-Type', 'text/xml');
    }

    public function offers()
    {
        $offers = Advertisement::all();
        
        return response()->view('sitemap.offers', [
            'offers' => $offers,
        ])->header('Content-Type', 'text/xml');
    }

    public function archives()
    {
        $offers = Advertisement::
        where('expired_at', '<', Carbon::now())
        ->get();
        
        return response()->view('sitemap.archives', [
            'offers' => $offers,
        ])->header('Content-Type', 'text/xml');
    }

    public function posts()
    {
        $posts = Post::all();

        return response()->view('sitemap.posts', [
            'posts' => $posts,
        ])->header('Content-Type', 'text/xml');
    }

    public function tags()
    {
        $tags = Tag::all();

        return response()->view('sitemap.tags', [
            'tags' => $tags,
        ])->header('Content-Type', 'text/xml');
    }

    public function pins()
    {
        $pins = Pin::all();

        return response()->view('sitemap.pins', [
            'pins' => $pins,
        ])->header('Content-Type', 'text/xml');
    }

    public function foreigns()
    {
        $foreigns = ForeignOffer::all();

        return response()->view('sitemap.foreigns', [
            'foreigns' => $foreigns,
        ])->header('Content-Type', 'text/xml');
    }

    public function companies()
    {
        $companies = new Collection();
        $users =  User::with(['roles', 'profile'])
        ->get();
        foreach($users as $user)
        {
            if($user->hasRole('company'))
            {
                $companies->push($user);
            }
        }

        return response()->view('sitemap.companies', [
            'companies' => $companies,
        ])->header('Content-Type', 'text/xml');
    }
}
