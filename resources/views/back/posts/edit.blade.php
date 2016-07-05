@extends('layouts.back')

@section('content')
    <h2>{{ $post->title }}</h2>


    @if(Session::has('message'))
        @include('partials.back.message')
    @endif

    <form action="{{ action('PostController@update', $post) }}" method="post" enctype="multipart/form-data">
        {{ method_field('PUT') }}
        {{ csrf_field() }}

        <div class="form-group">
            @if($post->url_thumbnail)
                <img src="{{ $post->url_thumbnail() }}" class="img-responsive">
            @endif
            <label for="thumbnail">Thumbnail</label>
            <input type="file" name="url_thumbnail">

        </div>

        <div class="form-group">
            <label for="title">Titre</label>
            <input class="form-control" id="title" type="text" value="{{ $post->title }}" name="title"
                   placeholder="Le titre de votre article">
            @if($errors->has('title')) <span class="error">{{ $errors->first('title') }}</span> @endif
        </div>

        <div class="form-group">
            <label for="content">Contenu</label>
            <textarea class="form-control editor" name="content" id="content">{{ $post->content  }}</textarea>
            @if($errors->has('content')) <span class="error">{{ $errors->first('content') }}</span> @endif
        </div>

        <div class="form-group">
            <label for="date">Date</label>
            <input class="form-control" type="date" value="{{ $post->date }}" name="date" placeholder="dd/mm/YYYY">
            @if($errors->has('date')) <span class="error">{{ $errors->first('date') }}</span> @endif
        </div>

        <button class="btn btn-success">Modifier</button>

    </form>
@endsection