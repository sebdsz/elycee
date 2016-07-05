@extends('layouts.back')

@section('content')

    <h2>Page admin fiches (questions)</h2>

    <div>
        <div class="row">
            <div class="col-xs-12">
                @if(Session::has('message'))
                    @include('partials.back.message')
                @endif
            </div>
        </div>

        <div class="pull-right">
            <a href="{{ action('RecordController@create') }}" class="btn btn-primary">Ajouter</a>
        </div>


        <form action="{{ action('RecordController@multiple') }}" method="post">
            {{ csrf_field() }}
            <div class="row">
                <div class="form-group col-xs-6 col-md-3">
                    <select name="action" class="form-control">
                        <option value="publish">Publier</option>
                        <option value="unpublish">Dépublier</option>
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
                    <th>Titre</th>
                    <th>Question</th>
                    <th>Classe</th>
                    <th>Statut</th>
                </tr>

                @forelse($records as $record)
                    <tr>
                        <td><input class="checked" type="checkbox" name="checked[]" value="{{ $record->id }}"></td>
                        <td><a href="{{ action('RecordController@edit', $record) }}">{{ $record->title }}</a></td>
                        <td>{{ $record->content }}</td>
                        <td>{{ $record->class_level }}</td>
                        <td><div class="status status-{{ $record->status }}"></div></td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5">Aucune question dans la base de données.</td>
                    </tr>
                @endforelse
            </table>

        </form>
    </div>

@endsection