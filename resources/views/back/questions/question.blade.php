@extends('layouts.back')
@section('title', 'E-lycée - QCM')
@section('content')
    <div class="bg">
        <h3> {{ $question->content }}</h3>

        @if(! Session::has('success'))
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

                            @if($errors->has('status.*')) <span
                                    class="error">{{ $errors->first('status.*') }}</span> @endif
                        </div>
                    </div>
                @endforeach
                <button class="btn btn-primary" title="Valider le QCM">Valider</button>
            </form>
        @else
            {{ csrf_field() }}
            <input type="hidden" name="question_id" value="{{ $question->id }}">
            @foreach($question->choices as $index => $choice)
                <div class="question">
                    <div class="form-group">
                        <label class="{{ \App\Helpers\Check::check(Session::get('success'), $index) }}">{{ $choice->content }}</label>
                        <input {{ \App\Helpers\Check::isChecked(Session::get('checked'), $index) }} disabled
                               type="checkbox" value="1">
                    <span>
                        @if(\App\Helpers\Check::check(Session::get('success'), $index) === 'label-success')
                            +1 point
                        @else
                            -1 point
                        @endif
                    </span>
                    </div>
                </div>
            @endforeach
            <p><span class="glyphicon glyphicon-hourglass"></span> Vous avez répondu en {{ Session::get('timer') }} secondes.</p>
            <p><span class="glyphicon glyphicon-certificate"></span> Votre score est de : {{ Session::get('note') }}/{{ Session::get('max') }}</p>
            <a class="btn btn-primary" href="{{ action('QCMController@index') }}">OK</a>
        @endif
    </div>
@endsection