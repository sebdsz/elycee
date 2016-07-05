@extends('layouts.back')
@section('title', 'E-lycée - QCM')
@section('content')
    <p>Attention, mauvaise réponse : -1 point, bonne réponse : +1 point</p>
    <h2> {{ $question->title }}</h2>
    <h3> {{ $question->content }}</h3>

    <form action="{{ action('QCMController@check', $question) }}" method="post">
        {{ csrf_field() }}
        <input type="hidden" name="question_id" value="{{ $question->id }}">
        @foreach($question->choices as $index => $choice)
            <div class="question">
                <div class="form-group">
                    <input type="hidden" name="id[]" value="{{ $choice->id }}">
                    <input type="hidden" value="0" name="status[{{$index}}]">
                    <label for="choice-{{$index}}">{{ $choice->content }}</label>
                    <input id="choice-{{$index}}" type="checkbox" value="1" name="status[{{$index}}]">

                    @if($errors->has('status.*')) <span class="error">{{ $errors->first('status.*') }}</span> @endif
                </div>
            </div>
        @endforeach
        <button class="btn btn-primary" title="Valider le QCM">Valider</button>
    </form>


@endsection