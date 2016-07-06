@extends('layouts.front')

@section('content')
    <div class="row">
        <div class="post col-xs-12">
            @if($post)
                @include('partials.post')
            @else
                Aucun article
            @endif
        </div>
    </div>
    <div id="posts" class="row">
        @foreach($posts as $post)
            <div class="post col-xs-12 col-lg-4 col-md-6">
                @include('partials.post')
            </div>
        @endforeach
    </div>
@endsection