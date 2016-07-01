@extends('layouts.front')

@section('content')
    <h2>Page d'accueil</h2>

    <div id="content">
        <div id="posts">
            <h3>Articles</h3>
            @foreach($posts as $post)
                <div class="post">
                    <img src="{{ $post->url_thumbnail }}" alt="">
                    <h4>{{ $post->title }}</h4>
                    <p>{{ $post->abstract }}</p>
                    <p>{{ $post->excerpt() }}</p>
                    <a href="{{ action('FrontController@post', $post) }}">Lire la suite</a>
                    <p>{{ $post->url_thumbnail }}</p>
                    <p>{{ $post->date }}</p>
                    <p>{{ $post->user->username }}</p>
                    <p>{{ $post->status }}</p>
                    <p>{{ count($post->comments) }} {{ trans_choice('site.comments', count($post->comments)) }}</p>
                </div>
            @endforeach
        </div>
    </div>
@endsection