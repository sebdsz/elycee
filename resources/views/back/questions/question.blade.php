@extends('layouts.back')
@section('title', 'E-lycée - QCM')
@section('content')

    <h2> {{ $question->title }}</h2>
    <h3> {{ $question->content }}</h3>

    <form action="{{ action('QCMController@check', $question) }}" method="post">
        {{ csrf_field() }}
        <input type="hidden" name="question_id" value="{{ $question->id }}">
        @foreach($question->choices as $index => $choice)
            <div class="question">
                {{ $choice->content }}
                <div class="form-group">
                    <input type="hidden" name="id[]" value="{{ $choice->id }}">
                    <input id="no-{{$index}}" type="checkbox" value="0" name="status[{{$index}}]">
                    <label for="no-{{$index}}">Non</label>
                    <input id="yes-{{$index}}" type="checkbox" value="1" name="status[{{$index}}]">
                    <label for="yes-{{$index}}">Oui</label>
                </div>
            </div>
        @endforeach
        <button class="btn btn-primary" title="Valider le QCM">Valider</button>
    </form>


@endsection