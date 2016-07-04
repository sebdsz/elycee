<?php

namespace App\Http\Controllers;

use App\Post;
use App\Http\Requests;
use Illuminate\Http\Request;


class FrontController extends Controller
{
    public function index()
    {
        $posts = Post::with('comments', 'user')->get();

        return view('front.home', compact('posts'));
    }

    public function posts()
    {
        $posts = Post::with('comments', 'user')->get();

        return view('front.posts', compact('posts'));
    }

    public function post(Post $post)
    {
        return view('front.post', compact('post'));
    }

    public function school()
    {
        return view('front.school');
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
