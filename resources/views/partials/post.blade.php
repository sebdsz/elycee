<div>
    @if($post->url_thumbnail) <a href="{{ action('FrontController@post', $post) }}"><img src="{{ $post->url_thumbnail() }}" alt="" class="img-responsive"></a> @endif
    <div class="content">
        <h4><a href="{{ action('FrontController@post', $post) }}">{{ $post->title }}</a></h4>
        <p>{!! $post->excerpt() !!}</p>
        <div class="row">
            <div class="col-xs-12">
                <a class="read" href="{{ action('FrontController@post', $post) }}">Lire la suite</a>
                <!-- <p class="byUser">Par {{ $post->user->username }}, le {{ $post->fullDate() }}</p> -->
            </div>
        </div>
        <p class="count"><span class="glyphicon glyphicon-comment"></span> {{ count($post->comments) }} {{ trans_choice('site.comments', count($post->comments)) }}
        </p>
    </div>
</div>