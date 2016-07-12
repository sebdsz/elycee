@extends('layouts.back')

@section('content')
    <div>
        <div class="row">
            <div class="col-xs-12" style="margin-bottom: 25px">
                <h2 style="margin:0 25px 0 0" class="pull-left">Tous les articles (<span
                            class="count">{{count($posts)}}</span>)</h2>
                <form class="pull-left" action="{{ action('PostController@feed') }}" method="post">
                    {{ csrf_field() }}
                    <button class="btn btn-warning">Importer des news via le flux rss le monde ?</button>
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
                        <td>{{ count($post->commentaires) }}</td>
                        <td>
                            <div class="status status-{{ $post->status }}"></div>
                        </td>
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