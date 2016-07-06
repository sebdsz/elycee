@if($post->url_thumbnail) <img src="{{ $post->url_thumbnail() }}" alt="" class="img-responsive"> @endif
<h4>{{ $post->title }}</h4>
<p>{!! $post->excerpt() !!}</p>
<a href="{{ action('FrontController@post', $post) }}">Lire la suite</a>
<p>Par {{ $post->user->username }}, le {{ $post->fullDate() }}</p>
<p class="count">{{ count($post->comments) }} {{ trans_choice('site.comments', count($post->comments)) }}
    <span class="icon-comment"></span></p>
<div class="comments">
    @foreach($post->comments as $comment)
        <div class="comment">
            @can('delete', $comment)
            <form class="pull-right delete-comment" action="{{ action('CommentController@delete', $comment) }}" method="post">
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
</div>