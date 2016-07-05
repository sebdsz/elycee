@extends('layouts.back')
@section('title', 'E-lycée - Dashboard étudiant')
@section('content')

    <h2>Dashboard</h2>

    @if($newQCM)
        <p>Vous avez {{ $newQCM }} {{ trans_choice('site.newQCM', $newQCM) }} à valider.</p>
    @endif

    <h3>Statistiques</h3>
    <div class="score">
        <div>
            <span class="icon-score"></span> {{ $student->score() }} {{ trans_choice('site.points', $student->score()) }} sur {{ $maxScore }}
        </div>
        <div>
            <span class="icon-qcm"></span> {{ $totalQCM }} {{ trans_choice('site.qcm_finish', $totalQCM) }}
        </div>
    </div>

@endsection