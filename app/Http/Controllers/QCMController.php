<?php

namespace App\Http\Controllers;

use Auth;
use App\Score;
use App\Choice;
use App\Question;
use App\Http\Requests;
use Illuminate\Http\Request;


class QCMController extends Controller
{

    public function dashboard()
    {
        $student = Auth::user();

        $scores = $student->scores;
        $newQCM = 0;
        $totalQCM = 0;
        $maxScore = 0;
        $choice = [];

        foreach ($scores as $score) {
            $choice = $score->question_id;
        }
        if ($choice) {
            $choices = Choice::where('question_id', $choice)->get();
            $newQCM = Question::where('id', '!=', $choice)->get()->count();
            $maxScore = count($choices);

        }

        if ($scores) {
            foreach ($scores as $score) {
                $totalQCM++;
            }
        }


        return view('back.questions.dashboard', compact('student', 'maxScore', 'totalQCM', 'newQCM'));
    }

    public function index()
    {
        $class = Auth::user()->role;
        $questions = Question::publish()->where('class_level', $class)->get();

        return view('back.questions.index', compact('questions'));
    }

    public function question($id)
    {
        $question = Question::findOrFail($id);

        return view('back.questions.question', compact('question'));
    }

    public function check(Request $request)
    {
        if ($request->get('id')) {
            $note = 0;
            foreach ($request->get('id') as $key => $id) {
                $choice = Choice::findOrFail($request->get('id')[$key]);
                if ($choice->status == $request->get('status')[$key])
                    $note++;
                else
                    $note--;
            }

            $note = $note > 0 ? $note : 0;

            Score::create([
                'user_id' => Auth::user()->id,
                'question_id' => $request->get('question_id'),
                'note' => $note,
            ]);

            return redirect()->action('QCMController@index')->with('message', 'Vos réponses ont été envoyé aux enseignants, merci !');
        }
    }


}
