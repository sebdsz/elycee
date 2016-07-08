@extends('layouts.back')

@section('content')
    <h2>Nouvelle question</h2>


    @if(Session::has('message'))
        @include('partials.back.message')
    @endif

    <form action="{{ action('RecordController@store') }}" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}

        <div class="form-group">
            <label for="class_level">Niveau</label>
            <select name="class_level" id="class_level" class="form-control" required>
                <option value="first_class">Première S</option>
                <option value="final_class">Terminale S</option>
            </select>
            @if($errors->has('class_level')) <span class="error">{{ $errors->first('class_level') }}</span> @endif
        </div>

        <div class="form-group">
            <label for="number">Nombre de choix (*)</label>
            <input type="text" name="number" class="form-control" required value="{{ old('number') }}">
            @if($errors->has('number')) <span class="error">{{ $errors->first('number') }}</span> @endif
        </div>

        <div class="form-group">
            <label for="content">Rédaction de la question (*)</label>
            <textarea name="content" class="form-control" id="content" required>{{ old('content') }}</textarea>
            @if($errors->has('content')) <span class="error">{{ $errors->first('content') }}</span> @endif
        </div>

        <button class="btn btn-success">Ajouter</button>

    </form>
@endsection