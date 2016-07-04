@extends('layouts.back')

@section('content')
    <div class="row">
        <section class="col-xs-12 col-md-6">
            <h2>Gestion des fiches</h2>
        </section>

        <section class="col-xs-12 col-md-6">
            <h2>Statistiques</h2>
            <p>{{ $countComments }} {{ trans_choice('site.comments', $countComments) }}</p>
            <p>{{ $countRecords }} {{ trans_choice('site.publishRecords', $countRecords) }}</p>
            <p>{{ $countStudents }} {{ trans_choice('site.students', $countStudents) }}</p>
        </section>
    </div>
    <div class="row">
        <section class="col-xs-12 col-md-6">
            <h2>Gestion des articles</h2>
            <div>
                <h3>Derniers articles</h3>
                <div class="last-posts">
                    @foreach($posts as $post)
                        <div class="last-post">
                            <a href="{{ action('PostController@edit', $post) }}">{{ $post->title }}</a> {{ $post->status }}
                        </div>
                    @endforeach
                        <a href="{{ action('PostController@index') }}">Voir tous les articles</a>
                </div>
            </div>
        </section>

        <section class="col-xs-12 col-md-6">
            <h2>Gestion des élèves</h2>
        </section>
    </div>
@endsection