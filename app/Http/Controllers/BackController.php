<?php

namespace App\Http\Controllers;

use Auth;
use App\Post;
use App\User;
use App\Comment;
use App\Question;
use Illuminate\Http\Request;

use App\Http\Requests;

class BackController extends Controller
{

    public function __construct()
    {
        if (!Auth::user()->isTeacher())
            return redirect('QCMController@dashboard');
    }

    public function index()
    {
        $posts = Post::last()->get();
        $countComments = Comment::all()->count();
        $countRecords = Question::all()->count();
        $countStudents = User::Student()->get()->count();

        return view('back.dashboard', compact('posts', 'countComments', 'countRecords', 'countStudents'));
    }
}
