<?php

namespace App\Http\Controllers;

use App\Question;
use Auth;
use App\Http\Requests;
use Illuminate\Http\Request;


class QCMController extends Controller
{
    public function dashboard()
    {
        $student = Auth::user();

        $scores = $student->scores;
        $total = 0;
        $totalQCM = 0;
        $maxScore = 1000;
        if ($scores) {
            foreach ($scores as $score) {
                $total += $score->note;
                $totalQCM++;
            }
        }

        return view('back.qcm.dashboard', compact('total', 'maxScore', 'totalQCM'));
    }

    public function index()
    {
        $questions = Question::publish()->get();

        return view('back.qcm.index', compact('questions'));
    }
}
