@extends('layouts.back')

@section('content')
    <div class="row">
        <section class="col-xs-12 col-md-6">
            <h2>Gestion des fiches</h2>
            <h3>Dernières fiches</h3>
            @forelse($questions as $question)
                <a href="{{ action('RecordController@edit', $question) }}">{{ $question->title }}</a>
            @empty
                Aucune question dans la base de données.
            @endforelse
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
                    @forelse($posts as $post)
                        <div class="last-post">
                            <a href="{{ action('PostController@edit', $post) }}">{{ $post->title }}</a> {{ $post->status }}
                        </div>
                    @empty
                        Aucun article dans la base de données.
                    @endforelse
                    <a href="{{ action('PostController@index') }}">Voir tous les articles</a>
                </div>
            </div>
        </section>

        <section class="col-xs-12 col-md-6">
            <h2>Gestion des élèves</h2>
            <h3>Derniers élèves</h3>
            @forelse($students as $student)
                <a href="{{ action('StudentController@edit', $student) }}">{{ $student->username }}</a>
            @empty
                Aucun élève dans la base de données.
            @endforelse
        </section>
    </div>
@endsection