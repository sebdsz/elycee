@extends('layouts.back')

@section('content')
    <div class="bg">
        <div class="row">
            <div class="col-xs-12" style="margin-bottom: 25px">
                <h3 class="pull-left">Tous les articles (<span
                            class="count">{{count($posts)}}</span>)</h3>
                <form class="pull-right" action="{{ action('PostController@feed') }}" method="post">
                    {{ csrf_field() }}
                    <button class="btn btn-warning">Importer des actualités</button>
                </form>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12">
                @if(Session::has('message'))
                    @include('partials.back.message')
                @endif
            </div>
        </div>

        <div class="pull-right">
            <a href="{{ action('PostController@create') }}" class="btn btn-add">+</a>
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


            <table class="table">
                <tr>
                    <th><input class="all" type="checkbox" name="all" title="Cocher toutes les cases"></th>
                    <th>Titre</th>
                    <th>Auteur</th>
                    <th>Publié le</th>
                    <th>Commentaires</th>
                    <th>Statut</th>
                </tr>

                @forelse($posts as $post)
                    <tr>
                        <td><input class="checked" type="checkbox" name="checked[]" value="{{ $post->id }}"
                                   title="Cocher cette case pour séléctionner l'article correspondant"></td>
                        <td><a href="{{ action('PostController@edit', $post) }}">{{ $post->title }}</a></td>
                        <td>{{ $post->user->username }}</td>
                        <td>{{ $post->date }}</td>
                        <td>{{ count($post->comments) }}</td>
                        <td>
                            <div class="status status-{{ $post->status }}"></div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6">Aucun article dans la base de données.</td>
                    </tr>
                @endforelse
            </table>

        </form>
    </div>

@endsection