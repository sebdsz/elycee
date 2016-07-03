@extends('layouts.back')

@section('content')

    <h2>Page admin articles</h2>



    <div>Article :
        <a href="{{ action('PostController@create') }}">Ajouter</a>
    </div>

    <table>
        <tr>
            <th></th>
            <th>Titre</th>
            <th>Auteur</th>
            <th>Commentaires</th>
            <th>Statut</th>
        </tr>

        @foreach($posts as $post)
            <tr>
                <td></td>
                <td><a href="{{ action('PostController@edit', $post) }}">{{ $post->title }}</a></td>
                <td>{{ $post->user->username }}</td>
                <td>{{ count($post->commentaires) }}</td>
                <td>{{ $post->status }}</td>
            </tr>
        @endforeach
    </table>

@endsection