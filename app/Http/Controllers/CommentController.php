<?php

namespace App\Http\Controllers;

use Auth;
use Gate;
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
        $comment = Comment::findOrFail($id);

        if (Gate::denies('update', $comment)) {
            abort(403);
        }

        $content = str_replace('<br>', '', $request->get('content'));

        $comment->update([
            'content' => $content,
        ]);

        if ($request->ajax() || $request->wantsJson())
            return 'ok';

        return back()->with('message', 'Votre commentaire a été modifié avec succès.');
    }


    public function delete(Request $request, $id)
    {
        $comment = Comment::findOrFail($id);

        if (Gate::denies('delete', $comment)) {
            abort(403);
        }

        $post_id = $comment->post_id;
        $comment->delete();
        $count = Comment::where('post_id', $post_id)->count() ? Comment::where('post_id', $post_id)->count() : 0;

        if ($request->ajax() || $request->wantsJson())
            return $count . ' ' . trans_choice('site.comments', $count);

        return back()->with('message', 'Votre commentaire a été éffacé.');
    }
}
