@extends('layouts.front')

@section('content')
    <h2>{{ $post->title }}</h2>
    <div id="content">
        <div id="post">
            <img src="{{ $post->url_thumbnail() }}" alt="">
            <p>{{ $post->abstract }}</p>
            <p>{!! $post->content !!}</p>
            <p>Écrit par {{ $post->user->username }}, le {{ $post->fullDate() }}</p>
            <p>{{ count($post->comments) }} {{ trans_choice('site.comments', count($post->comments)) }}</p>
            <div class="comments">
                @foreach($post->comments as $comment)
                    <div class="comment">
                        @can('delete', $comment)
                        <form class="pull-right delete-comment"
                              action="{{ action('CommentController@delete', $comment) }}" method="post">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button class="btn btn-danger" title="Supprimer mon commentaire">x</button>
                        </form>
                        @endcan
                        <p>{{ $comment->content }}</p>
                        <p title="Le {{ utf8_encode($comment->date->formatLocalized('%A %d %B %Y &agrave; %H:%M:%S')) }}">
                            Par {{ $comment->user->username }}, il y a {{ $comment->ago() }}.</p>
                    </div>
                @endforeach
                @can('comment', $post)
                <form action="{{ action('CommentController@store') }}" method="post">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="content">Votre commentaire</label>
                        <input type="hidden" value="{{ $post->id }}" name="post_id">
                        <textarea name="content" id="content" class="form-control"></textarea>
                        @if($errors->has('content'))
                            <span class="error">{{ $errors->first('content') }}</span>
                        @endif
                    </div>
                    <button class="btn btn-primary">Commenter</button>
                </form>
                @endcan
            </div>
        </div>
    </div>
@endsection