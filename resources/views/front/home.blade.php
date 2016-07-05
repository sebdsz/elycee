@extends('layouts.front')

@section('content')
    {{ $posts->links() }}
    <div id="posts">
        @foreach($posts as $index => $post)
            <div class="post col-xs-12">
                @include('partials.post')
            </div>
        @endforeach
    </div>
@endsection