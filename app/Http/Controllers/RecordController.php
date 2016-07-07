<?php

namespace App\Http\Controllers;

use App\Choice;
use App\Question;
use App\Http\Requests;
use Illuminate\Http\Request;

class RecordController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $records = Question::all();

        return view('back.records.index', compact('records'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('back.records.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Requests\RecordRequest $request)
    {
        $record = Question::create($request->all());

        for ($i = 0; $i < $request->get('number'); $i++) {
            Choice::create([
                'question_id' => $record->id,
            ]);
        }

        return redirect()->action('ChoiceController@edit', $record)->with('message', 'Question créee avec succès !');
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
        $record = Question::findOrFail($id);

        return view('back.records.edit', compact('record'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Requests\RecordRequest $request, $id)
    {
        $record = Question::findOrFail($id);
        $record->update($request->all());

        return redirect()->action('ChoiceController@edit', $record)->with('message', 'Question modifiée avec succès !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($record)
    {
        $record->delete();

        // return back()->with('message', 'Question supprimée avec succès !');
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
            Question::findOrFail($checked)->update(["status" => 1]);
        }

        return back()->with('message', 'Les QCM séléctionnés ont été publié avec succès !');
    }

    private function unpublish($request)
    {
        foreach ($request->get('checked') as $checked) {
            Question::findOrFail($checked)->update(['status' => 0]);
        }

        return back()->with('message', 'Les QCM séléctionnés ont été dépublié avec succès !');
    }

    private function delete($request)
    {
        foreach ($request->get('checked') as $checked) {
            $this->destroy(Question::find($checked));
        }

        if ($request->ajax() || $request->wantsJson()) return Question::all()->count();

        // return back()->with('message', 'Les articles séléctionnés ont été supprimé avec succès !');
    }
}
