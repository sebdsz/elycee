<?php

namespace App\Http\Controllers;

use Auth;
use File;
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
        if ($post) {
            $dirUpload = public_path(env('UPLOAD_PICTURES', 'uploads'));
            $files = File::allFiles($dirUpload . DIRECTORY_SEPARATOR . $post->id);
            foreach ($files as $file) File::delete($file);
            if (is_dir($dirUpload . DIRECTORY_SEPARATOR . $post->id)) rmdir($dirUpload . DIRECTORY_SEPARATOR . $post->id);

            $post->delete();
        }

        // return back()->with('message', 'Article supprimé avec succès !');
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

    public function action(Request $request)
    {
        switch ($request->get('action')) {
            case 'publish' :
                return $this->publish($request);
                break;
            case 'unpublish' :
                return $this->unpublish($request);
                break;
            case 'delete' :
                return $this->delete($request);
                break;
        }
    }

    private function publish($request)
    {
        foreach ($request->get('checked') as $checked) {
            Post::findOrFail($checked)->update(["status" => 1]);
        }

        return back()->with('message', 'Les articles séléctionnés ont été publié avec succès !');
    }

    private function unpublish($request)
    {
        foreach ($request->get('checked') as $checked) {
            Post::findOrFail($checked)->update(['status' => 0]);
        }

        return back()->with('message', 'Les articles séléctionnés ont été dépublié avec succès !');
    }

    private function delete($request)
    {
        foreach ($request->get('checked') as $checked) {
            $this->destroy(Post::find($checked));
        }

        if ($request->ajax() || $request->wantsJson()) return Post::all()->count();

        return back()->with('message', 'Les articles séléctionnés ont été supprimé avec succès !');
    }


}
