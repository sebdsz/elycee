@extends('layouts.back')

@section('content')

    <h2>Tous les articles (<span class="count">{{count($posts)}}</span>)</h2>
    <div>
        <div class="row">
            <div class="col-xs-12">
                @if(Session::has('message'))
                    @include('partials.back.message')
                @endif
            </div>
        </div>

        <div class="pull-right">
            <a href="{{ action('PostController@create') }}" class="btn btn-primary">Ajouter</a>
        </div>

        <form action="{{ action('PostController@action') }}" method="post">
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
                    <th><input class="all" type="checkbox" name="all" title="Cochez toutes les cases"></th>
                    <th>Titre</th>
                    <th>Auteur</th>
                    <th>Commentaires</th>
                    <th>Statut</th>
                </tr>

                @forelse($posts as $post)
                    <tr>
                        <td><input class="checked" type="checkbox" name="checked[]" value="{{ $post->id }}" title="Cochez cette case pour séléctionner l'article correspondant"></td>
                        <td><a href="{{ action('PostController@edit', $post) }}">{{ $post->title }}</a></td>
                        <td>{{ $post->user->username }}</td>
                        <td>{{ count($post->commentaires) }}</td>
                        <td><div class="status status-{{ $post->status }}"></div></td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5">Aucun article dans la base de données.</td>
                    </tr>
                @endforelse
            </table>

        </form>
    </div>

@endsection