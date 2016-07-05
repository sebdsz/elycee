<div id="sidebar">
    <h3>A lire aussi</h3>
    @foreach($posts as $post)
        <div class="list-post">
            <a href="">{{$post->title}}</a>
        </div>
    @endforeach
    <h3>Derniers tweets</h3>
    <a class="twitter-timeline" data-lang="fr" data-width="220" data-height="400" data-theme="light"
       href="https://twitter.com/ecolemultimedia">Tweets by École Multimedia</a>
    <script async src="//platform.twitter.com/widgets.js" charset="utf-8"></script>
</div>