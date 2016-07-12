@extends('layouts.front')

@section('content')
    <div id="content">
        <div class="row">
            <div class="col-xs-12">
                <p>Vous avez recherché tous les articles contenant le mot clé suivant : {{ $keywords }}.</p>
                <p>{{ $total }} {{ trans_choice('site.postsFind', $total) }} été trouvé.</p>
            </div>
        </div>
        <div id="posts" class="row">
            <div class="col-xs-12">
                {{ $posts->links() }}
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
@section('scripts')
    <style>
        mark {
            background: yellow;
            padding: 5px 0;
        }
    </style>
    <script>
        $('div.content').mark("{{ $keywords }}");
    </script>
@endsection