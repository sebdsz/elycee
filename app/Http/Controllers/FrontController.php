<?php

namespace App\Http\Controllers;

use File;
use Mail;
use App\Post;
use App\Http\Requests;
use Illuminate\Http\Request;


class FrontController extends Controller
{
    public function index()
    {

        $post = Post::with('comments', 'user')->publish()->last(1)->first();
        $posts = Post::with('comments', 'user')->publish()->skip(1)->take(10)->get();

        return view('front.home', compact('post', 'posts'));
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

    public function postContact(Requests\ContactRequest $request)
    {

        $data = $request->only('email', 'subject', 'comment');

        Mail::send('emails.contact', $data, function ($message) use ($data) {
            $message->from($data['email'], 'Contact Form');
            $message->subject($data['subject']);
            $message->to(['bossu.margaux@gmail.com' ,'sebdesquirez@gmail.com']);
        });


        return back()->with('message', 'Votre email à été envoyé !');
    }

    public function search(Requests\SearchRequest $request)
    {

        $keywords = $request->get('q');

        $posts = Post::with('comments', 'user')
            ->publish()
            ->where(function ($query) use ($keywords) {
                $query->orWhere('content', 'LIKE', "%$keywords%");
                $query->orWhere('title', 'LIKE', "%$keywords%");
            });
        $total = $posts->count();

        $posts = $posts
            ->paginate(10)
            ->setPath('recherche?q=' . $keywords);

        return view('front.search', compact('posts', 'keywords', 'total'));
    }
}
