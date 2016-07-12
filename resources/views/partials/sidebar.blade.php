<div>
    <h3>A lire aussi</h3>
    <ul class="list-posts">
        @foreach($posts as $post)
            <li>
                <a href="{{ action('FrontController@post', $post) }}"
                   title="Voir l'article {{ $post->title }}">{{$post->title}}</a>
            </li>
        @endforeach
    </ul>
    <hr>
    <h3>Derniers tweets</h3>
    <a class="twitter-timeline" data-lang="fr" data-width="220" data-height="400" data-theme="light"
       href="https://twitter.com/ecolemultimedia">Tweets by École Multimedia</a>
</div>