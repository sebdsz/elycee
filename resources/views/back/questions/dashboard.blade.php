@extends('layouts.back')

@section('content')

    <h2>Dashboard</h2>

    @if($newQCM)
        <p>Vous avez {{ $newQCM }} {{ trans_choice('site.newQCM', $newQCM) }} à valider.</p>
    @endif

    <h3>Statistiques</h3>
    <div class="score">
        <div>
            <span class="icon-score"></span> {{ $total }} {{ trans_choice('site.points', $total) }} sur {{ $maxScore }}
        </div>
        <div>
            <span class="icon-qcm"></span> {{ $totalQCM }} {{ trans_choice('site.qcm_finish', $totalQCM) }}
        </div>
    </div>

@endsection