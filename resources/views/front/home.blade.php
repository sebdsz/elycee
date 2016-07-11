@extends('layouts.front')

@section('content')
    <div class="row">
        <div class="post first col-xs-12">
            @if($post)
                @include('partials.post')
            @else
                Aucun article
            @endif
        </div>
    </div>
    <div id="posts" class="row">
        <div class="col-xs-12">
            @foreach($posts as $index => $post)
                @if($index % 2 == 0)
                    <div class="row">
                        @endif
                        <div class="post col-xs-12 col-md-6">
                            @include('partials.post')
                        </div>
                        @if($index % 2 == 1)
                    </div>
                @endif
            @endforeach
        </div>
    </div>
@endsection