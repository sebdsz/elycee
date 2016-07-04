<?php

namespace App\Http\Controllers;

use Auth;
use App\Comment;
use App\Http\Requests;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CommentController extends Controller
{

    public function store(Requests\CommentRequest $request)
    {
        $comment = Comment::create($request->all());
        $comment->date = Carbon::now();
        $comment->user_id = Auth::user()->id;
        $comment->touch();

        return back()->with('message', 'Votre commentaire a été ajouté.');

    }
}
