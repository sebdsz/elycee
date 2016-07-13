@extends('layouts.back')
@section('title', 'E-lycée - QCM')
@section('content')
    <div class="bg">
        <h3>Questions</h3>

        @if(Session::has('message'))
            @include('partials.back.message')
        @endif

        <div class="questions">
            <table class="table table-bordered">
                <tr>
                    <th>Status</th>
                    <th>Titre</th>
                    <th>Note</th>
                </tr>

                @forelse($questions as $question)
                    <tr>
                        @can('can', $question)
                        <td><div class="status status-0"></div></td>
                        <td><a href="{{ action('QCMController@question', $question) }}">{{ $question->content }}</a>
                        </td>
                        @else
                            <td><div class="status status-1"></div></td>
                            <td>{{ $question->content }}</td>
                            @endcan
                            <td>{{ Auth::user()->scoreByQuestion($question) }}
                                /{{ Auth::user()->maxScoreByQuestion($question) }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3">Aucun QCM disponible pour le moment.</td>
                    </tr>
                @endforelse
            </table>
        </div>
    </div>

@endsection