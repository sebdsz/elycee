@extends('layouts.back')
@section('title', 'E-lycée - Dashboard étudiant')
@section('content')
    <div class="bg">
        <h3>Dashboard</h3>

        @if(Auth::user()->newQCM())
            <p><span class="glyphiconglyphicon-fire"></span> Vous avez {{ $user->newQCM() }} {{ trans_choice('site.newQCM', $user->newQCM()) }} à valider.</p>
        @else
            <p><span class="glyphicon glyphicon-thumbs-up"></span> Vous avez réalisé tous les QCM pour le moment.</p>
        @endif

        <h3>Statistiques</h3>
        @if(!is_null($user->score()) )
            <div class="score">
                <div>
                    <span class="glyphicon glyphicon-certificate"></span> {{ $user->score() }}
                    /{{ $user->scoreMax() }} {{ trans_choice('site.points', $user->scoreMax()) }}
                    soit {{ $user->scoreAverage(20) }}/20 de moyenne.
                </div>
                <div>
                    <span class="glyphicon glyphicon-th-large"></span> {{ $user->madeQCM() }} {{ trans_choice('site.qcm_finish', $user->madeQCM()) }}
                </div>
            </div>
        @else
            <p>Aucune statistique pour le moment.</p>
        @endif
    </div>
@endsection