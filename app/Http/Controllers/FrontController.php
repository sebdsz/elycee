<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

use App\Http\Requests;

class FrontController extends Controller
{
    public function index()
    {
        $posts = Post::all();

        return view('front.home', compact('posts'));
    }

    public function posts()
    {
        $posts = Post::all();

        return view('front.posts', compact('posts'));
    }

    public function post(Post $post)
    {
        return view('front.post', compact('post'));
    }

    public function legal()
    {
        return view('front.legal');
    }

    public function contact()
    {
        return view('front.contact');
    }
}
