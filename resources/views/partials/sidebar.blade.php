<div id="sidebar">
    <h3>A lire aussi</h3>
    @foreach($posts as $post)
        <div class="list-post">
            <a href="">{{$post->title}}</a>
        </div>
    @endforeach
    <h3>Derniers tweets</h3>
</div>