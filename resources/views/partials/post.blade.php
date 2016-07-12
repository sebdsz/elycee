<div>
    @if($post->url_thumbnail) <img src="{{ $post->url_thumbnail() }}" alt="" class="img-responsive"> @endif
    <div class="content">
        <h4>{{ $post->title }}</h4>
        <p>{!! $post->excerpt() !!}</p>
        <div class="row">
            <div class="col-xs-12">
                <a class="read" href="{{ action('FrontController@post', $post) }}">Lire la suite</a>
                <p class="byUser">Par {{ $post->user->username }}, le {{ $post->fullDate() }}</p>
            </div>
        </div>
        <p class="count"><span class="glyphicon glyphicon-comment"></span> {{ count($post->comments) }} {{ trans_choice('site.comments', count($post->comments)) }}
        </p>
    </div>
</div>