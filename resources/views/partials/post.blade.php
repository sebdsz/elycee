@if($post->url_thumbnail) <img src="{{ $post->url_thumbnail() }}" alt="" class="img-responsive"> @endif
<h4>{{ $post->title }}</h4>
<p>{!! $post->excerpt() !!}</p>
<a href="{{ action('FrontController@post', $post) }}">Lire la suite</a>
<p>Par {{ $post->user->username }}, le {{ $post->fullDate() }}</p>
<p class="count">{{ count($post->comments) }} {{ trans_choice('site.comments', count($post->comments)) }}
    <span class="icon-comment"></span></p>