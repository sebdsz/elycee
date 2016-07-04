@extends('layouts.back')

@section('content')

    <h2>Page etudiant QCM</h2>

    <div class="questions">
        @foreach($questions as $question)

            <div class="question">
                @can('can', $question)
                <span class="icon-undo"></span>
                <a href="{{ action('QCMController@question', $question) }}">{{ $question->title }}</a>
                @else
                    <span class="icon-do"></span>
                    {{ $question->title }}
                    @endcan
            </div>


        @endforeach
    </div>

@endsection