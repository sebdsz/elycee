@extends('layouts.back')

@section('content')


    <div class="bg">
        <h3 class="pull-left">Tous les élèves (<span
                    class="count">{{count($students)}}</span>)</h3>
        <div class="row">
            <div class="col-xs-12">
                @if(Session::has('message'))
                    @include('partials.back.message')
                @endif
            </div>
        </div>

        <div class="pull-right">
            <a href="{{ action('StudentController@create') }}" class="btn btn-add">+</a>
        </div>

        <form action="{{ action('StudentController@action') }}" method="post">
            {{ csrf_field() }}

            <div class="row">
                <div class="form-group col-xs-6 col-md-3">
                    <select name="action" class="form-control">
                        <option value="delete">Supprimer</option>
                    </select>
                </div>
                <div class="form-group">
                    <button class="btn btn-primary action">Appliquer</button>
                </div>
            </div>


            <table class="table">
                <tr>
                    <th><input class="all" type="checkbox" name="all" title="Cocher toutes les cases"></th>
                    <th>{!! OrderBy::render('StudentController@index', 'username', 'Identifiant') !!}</th>
                    <th>{!! OrderBy::render('StudentController@index', 'email', 'Adresse email') !!}</th>
                    <th>{!! OrderBy::render('StudentController@index', 'role', 'Classe') !!}</th>
                    <th>Score</th>
                </tr>

                @forelse($students as $student)
                    <tr>
                        <td><input class="checked" type="checkbox" name="checked[]" value="{{ $student->id }}"
                                   title="Cocher pour séléctionner l'élève correspondant"></td>
                        <td><a href="{{ action('StudentController@edit', $student) }}">{{ $student->username }}</a></td>
                        <td>{{ $student->email }}</td>
                        <td>{{ $student->inClass() }}</td>
                        <td>{{ $student->scoreAverage(20) }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5">Aucun élève dans la base de données.</td>
                    </tr>
                @endforelse
            </table>

        </form>
    </div>

@endsection