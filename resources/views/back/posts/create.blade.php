@extends('layouts.back')

@section('content')
    <h2>Nouvel article</h2>


    @if(Session::has('message'))
        {{ Session::get('message') }}
    @endif

    <form action="{{ action('PostController@store') }}" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}

        <div class="form-group">
            <label for="thumbnail">Thumbnail</label>
            <input type="file" class="form-control" name="url_thumbnail">
        </div>

        <div class="form-group">
            <label for="title">Titre</label>
            <input id="title" class="form-control" type="text" value="{{ old('title') }}" name="title" placeholder="Le titre de votre article">
            @if($errors->has('title')) <span class="error">{{ $errors->first('title') }}</span> @endif
        </div>

        <div class="form-group">
            <label for="content">Contenu</label>
            <textarea name="content" class="form-control" id="content">{{ old('content') }}</textarea>
            @if($errors->has('content')) <span class="error">{{ $errors->first('content') }}</span> @endif
        </div>

        <div class="form-group">
            <label for="date">Date</label>
            <input type="text" class="form-control" name="date" placeholder="dd/mm/YYYY" value="{{ old('date') }}">
            @if($errors->has('date')) <span class="error">{{ $errors->first('date') }}</span> @endif
        </div>
        <button>Ajouter</button>

    </form>
@endsection