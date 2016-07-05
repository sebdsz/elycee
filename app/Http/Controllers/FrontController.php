<?php

namespace App\Http\Controllers;

use App\Post;
use App\Http\Requests;
use Illuminate\Http\Request;


class FrontController extends Controller
{
    public function index()
    {
        $posts = Post::with('comments', 'user')->publish()->paginate(10);

        return view('front.home', compact('posts'));
    }

    public function posts()
    {
        $posts = Post::with('comments', 'user')->publish()->paginate(10);

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

    public function search(Requests\SearchRequest $request)
    {
        /*$keywords = $request->get('q');
        $keywords = explode(' ', $keywords);

        foreach ($keywords as $index => $keyword) {
            if (strlen($keyword) <= 3)
                unset($keywords[$index]);
        }

        $posts = Post::publish()
            ->where(function ($query) use ($keywords) {
                foreach ($keywords as $keyword) {
                    $query->orWhere('content', 'LIKE', "%$keyword%");
                    $query->orWhere('title', 'LIKE', "%$keyword%");
                }
            })
            ->get();*/

        $keywords = $request->get('q');

        $posts = Post::publish()
            ->where(function ($query) use ($keywords) {
                $query->orWhere('content', 'LIKE', "%$keywords%");
                $query->orWhere('title', 'LIKE', "%$keywords%");
            })
            ->get();

        return view('front.search', compact('posts', 'keywords'));
    }
}
