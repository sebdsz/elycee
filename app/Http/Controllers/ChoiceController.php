<?php

namespace App\Http\Controllers;

use App\Choice;
use App\Http\Requests;
use App\Question;
use Illuminate\Http\Request;


class ChoiceController extends Controller
{

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $record = Question::findOrFail($id);

        return view('back.choices.edit', compact('record'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Requests\ChoiceRequest $request)
    {
        if ($request->get('id')) {
            foreach ($request->get('id') as $key => $id) {
                $choice = Choice::findOrFail($request->get('id')[$key]);
                $choice->content = $request->get('content')[$key];
                $choice->status = $request->get('status')[$key];
                $choice->touch();
            }

            return back()->with('message', 'QCM modifié avec succès !');
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($choice)
    {
        $choice->delete();

        return back()->with('message', 'QCM supprimée avec succès !');
    }

}