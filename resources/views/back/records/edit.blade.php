@extends('layouts.back')

@section('content')
    <div>
        <h2>{{ $record->title }}</h2>
        @if(Session::has('message'))
            @include('partials.back.message')
        @endif

        <form action="{{ action('RecordController@update', $record) }}" method="post" enctype="multipart/form-data">
            {{ method_field('PUT') }}
            {{ csrf_field() }}

            <div class="form-group">
                <label for="class_level">Niveau</label>
                <select name="class_level" id="class_level" class="form-control" required>
                    <option value="first_class" @if($record->class_level === 'first_class') selected @endif>Première S
                    </option>
                    <option value="final_class" @if($record->class_level === 'final_class') selected @endif>Terminale
                        S
                    </option>
                </select>
                @if($errors->has('class_level')) <span class="error">{{ $errors->first('class_level') }}</span> @endif
            </div>

            <div class="form-group">
                <input type="hidden" name="number" class="form-control" required value="{{ count($record->choices) }}">
                @if($errors->has('number')) <span class="error">{{ $errors->first('number') }}</span> @endif
            </div>

            <div class="form-group">
                <label for="content">Rédaction de la question (*)</label>
                <textarea name="content" class="form-control" id="content" required>{{ $record->content }}</textarea>
                @if($errors->has('content')) <span class="error">{{ $errors->first('content') }}</span> @endif
            </div>

            <button class="btn btn-success">Modifier</button>
        </form>
    </div>
@endsection