<?php

namespace App\Http\Controllers;

use Auth;
use App\Score;
use App\Choice;
use App\Question;
use App\Http\Requests;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;


class QCMController extends Controller
{

    public function dashboard()
    {
        $student = Auth::user();
        $maxScore = $student->scoreMax();
        $totalQCM = $student->madeQCM();
        $newQCM = $student->newQCM();

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
        if (Score::where(['question_id' => $id, 'user_id' => Auth::user()->id])->first()) return redirect()->action('QCMController@index');

        $question = Question::findOrFail($id);
        Session::put('time', Carbon::now());

        return view('back.questions.question', compact('question'));
    }

    public function check(Requests\QCMRequest $request)
    {

        if ($request->get('id')) {
            $note = 0;
            foreach ($request->get('id') as $key => $id) {
                if (isset($request->get('id')[$key]) && isset($request->get('status')[$key])) {
                    $choice = Choice::findOrFail($request->get('id')[$key]);
                    if ($choice->status == $request->get('status')[$key])
                        $note++;
                    else
                        $note--;
                }
            }
            $note = $note > 0 ? $note : 0;
            $max = count($request->get('id'));

            Score::create([
                'user_id' => Auth::user()->id,
                'question_id' => $request->get('question_id'),
                'note' => $note,
            ]);
            $qcm = Question::findOrFail($request->get('question_id'))->title;
            $time = Carbon::now()->diffInSeconds(Session::get('time'));

            return redirect()
                ->action('QCMController@index')
                ->with('message', 'Bravo vous avez répondu en ' . $time . ' secondes au QCM "' . $qcm . '", votre résultat est de ' . $note . '/' . $max . ' !');
        }
    }


}
