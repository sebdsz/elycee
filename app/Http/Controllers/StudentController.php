<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Http\Requests;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = User::student()->get();

        return view('back.students.index', compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('back.students.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Requests\StudentRequest $request)
    {
        $student = User::create($request->all());

        return redirect()->action('StudentController@edit', $student)->with('message', 'Étudiant ajouté à la base de données avec succès !');
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
        $student = User::findOrFail($id);

        return view('back.students.edit', compact('student'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Requests\StudentRequest $request, $id)
    {
        $student = User::findOrFail($id);
        $student->update($request->all());

        return back()->with('message', 'Étudiant modifié avec succès !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($student)
    {
        $student->delete();

        return back()->with('message', 'Étudiant supprimé de la base de données avec succès !');
    }

    public function multiple(Request $request)
    {
        if ($request->get('all')) {
            return $this->action_all($request);
        }
        if ($request->get('checked')) {
            return $this->action($request);
        }

        return back();
    }

    private function action($request)
    {
        switch ($request->get('action')) {
            case 'delete' :
                foreach ($request->get('checked') as $checked) {
                    User::findOrFail($checked)->delete();
                }
                $message = 'Les élèves séléctionnés ont été supprimé.';
                break;
        }

        if ($request->ajax() || $request->wantsJson())
            return User::all()->count();

        return back()->with('message', $message);
    }

    private function action_all($request)
    {
        switch ($request->get('action')) {
            case 'delete' :
                foreach (User::student()->get() as $user) {
                    $user->delete();
                }
                $message = 'Les élèves séléctionnés ont été supprimé.';
                break;
        }

        return back()->with('message', $message);
    }
}
