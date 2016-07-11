<?php

namespace App\Http\Controllers;

use Auth;
use App\Score;
use App\Choice;
use App\Question;
use Carbon\Carbon;
use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;


class QCMController extends Controller
{

    public function dashboard()
    {
        $user = Auth::user();

        return view('back.questions.dashboard', compact('user'));
    }

    public function index()
    {
        $class = Auth::user()->role;
        $questions = Question::publish()->where('class_level', $class)->get();

        return view('back.questions.index', compact('questions'));
    }

    public function question(Request $request, $id)
    {
        if (Score::where(['question_id' => $id, 'user_id' => Auth::user()->id])->first() && !Session::has('success')) return redirect()->action('QCMController@index');

        $question = Question::findOrFail($id);
        Session::put('time', Carbon::now());

        return view('back.questions.question', compact('question'));
    }

    public function check(Requests\QCMRequest $request)
    {

        if ($request->get('id')) {
            $note = 0;
            $success = [];
            $checked = [];
            foreach ($request->get('id') as $key => $id) {
                if (isset($request->get('id')[$key]) && isset($request->get('status')[$key])) {
                    $checked[$key] = $request->get('status')[$key];
                    $choice = Choice::findOrFail($request->get('id')[$key]);
                    if ($choice->status == $request->get('status')[$key]) {
                        $note++;
                        $success[$key] = 1;
                    } else {
                        $note--;
                        $success[$key] = 0;
                    }
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

            return back()
                ->with('checked', $checked)
                ->with('success', $success)
                ->with('note', $note)
                ->with('max', $max)
                ->with('timer', $time);
        }
    }


}
