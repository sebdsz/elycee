@extends('layouts.front')

@section('content')
    <h2>Toutes les actualités</h2>

    <div id="content">
        <div id="posts">
            <div class="col-xs-12">
                <div class="row">
                    <div class="col-xs-12">
                        {{ $posts->links() }}
                    </div>
                </div>
                @foreach($posts as $index => $post)
                    @if($index % 2 == 0)
                        <div class="row">
                            @endif
                            <div class="post col-xs-12 col-md-6">
                                @include('partials.post')
                            </div>
                            @if($index % 2 == 1 || $index === count($posts)-1)
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    </div>
@endsection