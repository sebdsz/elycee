@extends('layouts.back')

@section('content')
    <h2>{!! $record->content !!}</h2>


    @if(Session::has('message'))
        @include('partials.back.message')
    @endif

    <form action="{{ action('ChoiceController@update', $record) }}" method="post" enctype="multipart/form-data">
        {{ method_field('PUT') }}
        {{ csrf_field() }}

        @foreach($record->choices as $index => $choice)

            <div class="form-group">
                <label>Choix {{ $index+1 }}</label>
                <input type="hidden" value="{{ $choice->id }}" name="id[]">
                <div class="input-group">
                    <input type="text" name="content[]" class="form-control" value="{{ $choice->content }}">
                    <input type="hidden" name="status[{{ $index }}]" value="0">
                    <span class="input-group-addon">
                        <input type="checkbox" id="yes-{{$index}}" name="status[{{ $index }}]" value="1" @if($choice->status) checked @endif>
                    <label for="yes-{{$index}}">Vrai</label></span>

                </div>
                @if($errors->has('choices')) <span class="error">{{ $errors->first('class_level') }}</span> @endif
            </div>

        @endforeach

        <button class="btn btn-success">Modifier</button>

    </form>
@endsection