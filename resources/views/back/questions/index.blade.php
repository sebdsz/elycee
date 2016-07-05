@extends('layouts.back')
@section('title', 'E-lycée - QCM')
@section('content')

    <h2>QCM</h2>

    @if(Session::has('message'))
        @include('partials.back.message')
    @endif

    <div class="questions">
        @forelse($questions as $question)

            <div class="question">
                @can('can', $question)
                <span class="icon-undo"></span>
                <a href="{{ action('QCMController@question', $question) }}">{{ $question->title }}</a>
                @else
                    <span class="icon-do"></span>
                    {{ $question->title }}
                    @endcan
            </div>
        @empty
            Aucun QCM disponible pour le moment.
        @endforelse
    </div>

@endsection