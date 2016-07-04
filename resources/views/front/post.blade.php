@extends('layouts.front')

@section('content')
    <h2>Page des actualités</h2>

    <div id="content">
        <div id="post">
            <h3>{{ $post->title }}</h3>
            <img src="{{ $post->url_thumbnail() }}" alt="">
            <h4>{{ $post->title }}</h4>
            <p>{{ $post->abstract }}</p>
            <p>{{ $post->content }}</p>
            <p>{{ $post->date }}</p>
            <p>{{ $post->user->username }}</p>
            <p>{{ $post->status }}</p>
            <p>{{ count($post->comments) }} {{ trans_choice('site.comments', count($post->comments)) }}</p>
        </div>
    </div>
@endsection