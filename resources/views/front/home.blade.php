@extends('layouts.front')

@section('content')
    <div id="posts">
        <div class="post col-xs-12">
            @include('partials.post')
        </div>
        @foreach($posts as $post)
            <div class="post col-xs-12 col-lg-4 col-md-6">
                @include('partials.post')
            </div>
        @endforeach
    </div>
@endsection