@extends('layouts.back')

@section('content')

    <h2>Page admin élèves</h2>
    <div>
        <div class="row">
            <div class="col-xs-12">
                @if(Session::has('message'))
                    @include('partials.back.message')
                @endif
            </div>
        </div>

        <div class="pull-right">
            <a href="{{ action('StudentController@create') }}" class="btn btn-primary">Ajouter</a>
        </div>

        <form action="{{ action('StudentController@multiple') }}" method="post">
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


            <table class="table table-bordered">
                <tr>
                    <th><input class="all" type="checkbox" name="all"></th>
                    <th>Identifiant</th>
                    <th>Adresse email</th>
                    <th>Classe</th>
                    <th>Score</th>
                </tr>

                @forelse($students as $student)
                    <tr>
                        <td><input class="checked" type="checkbox" name="checked[]" value="{{ $student->id }}"></td>
                        <td><a href="{{ action('StudentController@edit', $student) }}">{{ $student->username }}</a></td>
                        <td>{{ $student->email }}</td>
                        <td>{{ $student->inClass() }}</td>
                        <td>{{ $student->score() }}</td>
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