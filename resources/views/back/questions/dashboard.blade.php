@extends('layouts.back')
@section('title', 'E-lycée - Dashboard étudiant')
@section('content')

    <h2>Dashboard</h2>

    @if(Auth::user()->newQCM())
        <p>Vous avez {{ $user->newQCM() }} {{ trans_choice('site.newQCM', $user->newQCM()) }} à valider.</p>
    @endif

    <h3>Statistiques</h3>
    <div class="score">
        <div>
            <span class="icon-score"></span> {{ $user->score() }}/{{ $user->scoreMax() }} {{ trans_choice('site.points', $user->scoreMax()) }} soit {{ $user->scoreAverage(20) }}/20 de moyenne.
        </div>
        <div>
            <span class="icon-qcm"></span> {{ $user->madeQCM() }} {{ trans_choice('site.qcm_finish', $user->madeQCM()) }}
        </div>
    </div>

@endsection