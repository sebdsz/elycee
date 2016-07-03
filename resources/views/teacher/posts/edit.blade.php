@extends('layouts.back')

@section('content')
    <h2>{{ $post->title }}</h2>


    @if(Session::has('message'))
        {{ Session::get('message') }}
    @endif

    <form action="{{ action('PostController@update', $post) }}" method="post" enctype="multipart/form-data">
        {{ method_field('PUT') }}
        {{ csrf_field() }}

        <label for="title">Titre</label>
        <input id="title" type="text" value="{{ $post->title }}" name="title" placeholder="Le titre de votre article">
        @if($errors->has('title')) <span class="error">{{ $errors->first('title') }}</span> @endif

        <label for="content">Contenu</label>
        <textarea name="content" id="content">{{ $post->content  }}</textarea>
        @if($errors->has('content')) <span class="error">{{ $errors->first('content') }}</span> @endif

        <label for="date">Date</label>
        <input type="text" value="{{ $post->date }}" name="date" placeholder="dd-mm-YYYY">
        @if($errors->has('date')) <span class="error">{{ $errors->first('date') }}</span> @endif

        <button>Modifier</button>

    </form>
@endsection