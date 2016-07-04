@extends('layouts.back')

@section('content')
    <h2></h2>


    @if(Session::has('message'))
        {{ Session::get('message') }}
    @endif

    <form action="{{ action('ChoiceController@update', $record) }}" method="post" enctype="multipart/form-data">
        {{ method_field('PUT') }}
        {{ csrf_field() }}

        @foreach($record->choices as $index => $choice)

            <div class="form-group">
                <label>Question {{ $index+1 }}</label>
                <input type="hidden" value="{{ $choice->id }}" name="id[]">
                <textarea name="content[]" class="form-control">{{ $choice->content }}</textarea>
                <input type="hidden" name="status[{{ $index }}]" value="0">
                <input type="checkbox" id="yes-{{$index}}" name="status[{{ $index }}]" value="1" @if($choice->status) checked @endif>
                <label for="yes-{{$index}}">Bonne réponse</label>
                @if($errors->has('choices')) <span class="error">{{ $errors->first('class_level') }}</span> @endif
            </div>

        @endforeach

        <button>Modifier</button>

    </form>
@endsection