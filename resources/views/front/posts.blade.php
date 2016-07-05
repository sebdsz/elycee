@extends('layouts.front')

@section('content')
    <h2>Actualités</h2>

    <div id="content">
        <div id="posts">
            <h3>Articles</h3>
            {{ $posts->links() }}
            @foreach($posts as $post)
                <div class="post">
                    @include('partials.post')
                </div>
            @endforeach
        </div>
    </div>
@endsection