<?php

namespace App\Http\Controllers;

use Auth;
use App\Post;
use App\User;
use App\Comment;
use App\Question;
use App\Http\Requests;
use Illuminate\Http\Request;

class BackController extends Controller
{

    public function index()
    {
        $posts = Post::last()->get();
        $questions = Question::last()->get();
        $students = User::student()->last()->get();
        $countComments = Comment::all()->count();
        $countRecords = Question::all()->count();
        $countStudents = User::Student()->get()->count();

        return view('back.dashboard', compact('posts', 'questions', 'students', 'countComments', 'countRecords', 'countStudents'));
    }
}
