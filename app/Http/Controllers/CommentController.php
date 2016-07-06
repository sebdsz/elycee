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

    public function update(Requests\CommentRequest $request, $id)
    {
        $content = str_replace('<br>', '', $request->get('content'));

        Comment::findOrFail($id)->update([
            'content' => $content,
        ]);

        //return back()->with('message', 'Votre commentaire a été ajouté.');
    }


    public function delete(Request $request, $id)
    {
        $post_id = Comment::findOrFail($id)->post_id;
        Comment::findOrFail($id)->delete();
        $count = Comment::where('post_id', $post_id)->count() ? Comment::where('post_id', $post_id)->count() : 0;

        if ($request->ajax() || $request->wantsJson())
            return $count . ' ' . trans_choice('site.comments', $count);

        return back()->with('message', 'Votre commentaire a été éffacé.');
    }
}
