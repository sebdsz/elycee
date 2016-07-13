@extends('layouts.back')

@section('content')



    <div class="bg">
        <h3 class="pull-left">Toutes les questions (<span
                    class="count">{{count($records)}}</span>)</h3>
        <div class="row">
            <div class="col-xs-12">
                @if(Session::has('message'))
                    @include('partials.back.message')
                @endif
            </div>
        </div>

        <div class="pull-right">
            <a href="{{ action('RecordController@create') }}" class="btn btn-add">+</a>
        </div>


        <form action="{{ action('RecordController@action') }}" method="post">
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


            <table class="table">
                <tr>
                    <th><input class="all" type="checkbox" name="all" title="Cocher toutes les cases"></th>
                    <th>Question</th>
                    <th>Classe</th>
                    <th>Statut</th>
                </tr>

                @forelse($records as $record)
                    <tr>
                        <td><input class="checked" type="checkbox" name="checked[]" value="{{ $record->id }}" title="Cocher pour séléctionner le QCM correspondant"></td>
                        <td><a href="{{ action('RecordController@edit', $record) }}">{{ $record->content }}</a></td>
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