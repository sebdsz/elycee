<?php

namespace App\Http\Controllers;

use Auth;
use App\Post;
use Illuminate\Http\Request;

use App\Http\Requests;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();

        return view('back.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('back.posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Requests\PostRequest $request)
    {
        $post = Post::create($request->all());
        $post->user_id = Auth::user()->id;
        $post->touch();
        $this->upload($request, $post);

        return redirect()->action('PostController@edit', $post)->with('message', 'Article crée avec succès !');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::findOrFail($id);

        return view('back.posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Requests\PostRequest $request, $id)
    {
        $post = Post::findOrFail($id);
        $post->update($request->all());
        $this->upload($request, $post);

        //$this->deletePicture($request, $post);

        return back()->with('message', 'Article modifié avec succès !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($post)
    {
        $post->delete();

        return back()->with('message', 'Article supprimé avec succès !');
    }

    private function upload(Requests\PostRequest $request, Post $post)
    {
        if (!empty($request->file('url_thumbnail'))) {
            $img = $request->file('url_thumbnail');
            $ext = $img->getClientOriginalExtension();
            $uri = str_random(50) . '.' . $ext;
            $img->move(env('UPLOAD_PICTURES', 'uploads') . DIRECTORY_SEPARATOR . $post->id, $uri);
            $post->url_thumbnail = $uri;
            $post->touch();
        }
    }

    public function multiple(Request $request)
    {
        if ($request->get('all')) {
            return $this->action_all($request);
        }
        if ($request->get('checked')) {
            return $this->action($request);
        }

        return back();
    }

    private function action($request)
    {
        switch ($request->get('action')) {
            case 'publish' :
                foreach ($request->get('checked') as $checked) {
                    Post::findOrFail($checked)->update(['status' => 1]);
                }
                $message = 'Les articles séléctionnés ont été publié.';
                break;
            case 'unpublish' :
                foreach ($request->get('checked') as $checked) {
                    Post::findOrFail($checked)->update(['status' => 0]);
                }
                $message = 'Les articles séléctionnés ont été dépublié.';
                break;
            case 'delete' :
                foreach ($request->get('checked') as $checked) {
                    Post::findOrFail($checked)->delete();
                }
                $message = 'Les articles séléctionnés ont été supprimé.';
                break;
        }

        return back()->with('message', $message);
    }

    private function action_all($request)
    {
        switch ($request->get('action')) {
            case 'publish' :
                foreach (Post::all() as $post) {
                    $post->update(['status' => 1]);
                }
                $message = 'Les articles séléctionnés ont été publié.';
                break;
            case 'unpublish' :
                foreach (Post::all() as $post) {
                    $post->update(['status' => 0]);
                }
                $message = 'Les articles séléctionnés ont été dépublié.';
                break;
            case 'delete' :
                foreach (Post::all() as $post) {
                    $post->delete();
                }
                $message = 'Les articles séléctionnés ont été supprimé.';
                break;
        }

        return back()->with('message', $message);
    }
}
