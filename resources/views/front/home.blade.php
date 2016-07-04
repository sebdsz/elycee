@extends('layouts.front')

@section('content')
    <h2>Page d'accueil</h2>

    <div id="content">
        <div id="posts">
            <h3>Articles</h3>
            @foreach($posts as $post)
                <div class="post">
                    @if($post->url_thumbnail) <img src="{{ $post->url_thumbnail() }}" alt=""> @endif
                    <h4>{{ $post->title }}</h4>
                    <p>{{ $post->abstract }}</p>
                    <p>{{ $post->excerpt() }}</p>
                    <a href="{{ action('FrontController@post', $post) }}">Lire la suite</a>
                    <p>{{ $post->fullDate() }}</p>
                    <p>{{ $post->user->username }}</p>
                    <p>{{ $post->status }}</p>
                    <p>{{ count($post->comments) }} {{ trans_choice('site.comments', count($post->comments)) }}</p>
                    <div class="comments">
                        @foreach($post->comments as $comment)
                            <div class="comment">
                                @can('delete', $comment)
                                <form action="{{ action('CommentController@delete', $comment) }}" method="post">
                                    {{ method_field('DELETE') }}
                                    {{ csrf_field() }}

                                    <button>Supprimer</button>
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
                            <label for="content">Votre commentaire</label>
                            <input type="hidden" value="{{ $post->id }}" name="post_id">
                            <textarea name="content" id="content"></textarea>
                            @if($errors->has('content')) <span
                                    class="error">{{ $errors->first('content') }}</span> @endif
                            <button>Commenter</button>
                        </form>
                        @endcan
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection