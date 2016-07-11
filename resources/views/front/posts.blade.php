@extends('layouts.front')

@section('content')
    <h2>Toutes les actualités</h2>

    <div id="content">
        <div id="posts">
            <div class="col-xs-12">
                {{ $posts->links() }}
                @foreach($posts as $index => $post)
                    @if($index % 2 == 0)
                        <div class="row">
                            @endif
                            <div class="post col-xs-12 col-md-6">
                                @include('partials.post')
                            </div>
                            @if($index % 2 == 1 || count($posts) < 2)
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    </div>
@endsection