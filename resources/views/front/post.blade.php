@extends('layouts.front')

@section('content')
    <div id="content">
        <div class="post">
            <div>
                <div class="titleBackground">
                    <h2>{{ $post->title }}</h2>
                    <p class="byUser">Écrit par {{ $post->user->username }}, le {{ $post->fullDate() }}</p>
                </div>
                <img src="{{ $post->url_thumbnail() }}" alt="">
                <div class="content">
                    <p>{!! $post->content !!}</p>
                    <p class="count">{{ count($post->comments) }} {{ trans_choice('site.comments', count($post->comments)) }}</p>
                    <div class="comments">
                        @foreach($post->comments as $comment)
                            <div class="box-comment">
                                @can('delete', $comment)
                                <div class="controls pull-right">
                                    <button class="edit-comment"
                                            data-url="{{ action('CommentController@update', $comment) }}">
                                        <span class="glyphicon glyphicon-edit"></span>
                                    </button>
                                    <form class="delete-comment"
                                          action="{{ action('CommentController@delete', $comment) }}" method="post">
                                        {{ method_field('DELETE') }}
                                        {{ csrf_field() }}
                                        <button title="Supprimer mon commentaire"><span
                                                    class="glyphicon glyphicon-remove"></span></button>
                                    </form>
                                </div>
                                @endcan
                                <p class="info-comment"
                                   title="Le {{ utf8_encode($comment->date->formatLocalized('%A %d %B %Y &agrave; %H:%M:%S')) }}">
                                    Par {{ $comment->user->username }}, il y a {{ $comment->ago() }}.</p>
                                <p class="comment">{{ $comment->content }}</p>
                            </div>
                        @endforeach
                        @can('comment', $post)
                        <form action="{{ action('CommentController@store') }}" method="post">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="content">Votre commentaire</label>
                                {!! Honeypot::generate('my_name', 'my_time') !!}
                                <input type="hidden" value="{{ $post->id }}" name="post_id">
                                <textarea name="content" id="content" class="form-control"></textarea>
                                @foreach($errors->all() as $error)
                                    <p class="error">{{ $error }}</p>
                                @endforeach
                            </div>
                            <button class="btn btn-primary">Commenter</button>
                        </form>
                        @else
                            <p>Connectez-vous pour commenter cet article</p>
                            @endcan
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection