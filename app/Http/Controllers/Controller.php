<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use View;
use App\Post;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesResources;

class Controller extends BaseController
{
    use AuthorizesRequests, AuthorizesResources, DispatchesJobs, ValidatesRequests;

    public function __construct()
    {
        View::composer('partials.sidebar', function ($view) {
            $posts = Post::last(10)->get();
            $view->with(compact('posts'));
        });
    }
}
