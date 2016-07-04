@extends('layouts.back')

@section('content')
    <h2>{{ $record->title }}</h2>


    @if(Session::has('message'))
        {{ Session::get('message') }}
    @endif

    <form action="{{ action('RecordController@update', $record) }}" method="post" enctype="multipart/form-data">
        {{ method_field('PUT') }}
        {{ csrf_field() }}

        <div class="form-group">
            <label for="class_level">Niveau</label>
            <select name="class_level" id="class_level" class="form-control" required>
                <option value="premiere">Première S</option>
                <option value="terminale">Terminale S</option>
            </select>
            @if($errors->has('class_level')) <span class="error">{{ $errors->first('class_level') }}</span> @endif
        </div>

        <div class="form-group">
            <input type="hidden" name="number" class="form-control" required value="{{ count($record->choices) }}">
            @if($errors->has('number')) <span class="error">{{ $errors->first('number') }}</span> @endif
        </div>

        <div class="form-group">
            <label for="title">Titre (*)</label>
            <input id="title" class="form-control" type="text" value="{{ $record->title }}" name="title" placeholder="Le titre de votre question" required>
            @if($errors->has('title')) <span class="error">{{ $errors->first('title') }}</span> @endif
        </div>

        <div class="form-group">
            <label for="content">Rédaction de la question (*)</label>
            <textarea name="content" class="form-control" id="content" required>{{ $record->content }}</textarea>
            @if($errors->has('content')) <span class="error">{{ $errors->first('content') }}</span> @endif
        </div>

        <button>Modifier</button>

    </form>
@endsection