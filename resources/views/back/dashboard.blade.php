@extends('layouts.back')

@section('content')
    <div class="row bg">
        <section class="col-xs-12 col-md-6">
            <h2>Dernières questions</h2>
            <div class="row">
                @forelse($questions as $question)
                    <div class="last col-xs-12">
                        <span class="status status-{{ $question->status }}" style="float:left; margin-right:10px"></span>
                        <a href="{{ action('RecordController@edit', $question) }}">{{ $question->content }}</a>
                    </div>
                @empty
                    Aucune question dans la base de données.
                @endforelse
                <a class="btn btn-primary" href="{{ action('RecordController@index') }}">Voir toutes les questions</a>
            </div>
        </section>

        <section class="col-xs-12 col-md-6">
            <h2>Statistiques</h2>
            <p>{{ $countComments }} {{ trans_choice('site.comments', $countComments) }}</p>
            <p>{{ $countRecords }} {{ trans_choice('site.publishRecords', $countRecords) }}</p>
            <p>{{ $countStudents }} {{ trans_choice('site.students', $countStudents) }}</p>
        </section>
    </div>
    <div class="row bg">
        <section class="col-xs-12 col-md-6">
            <div>
                <h2>Derniers articles</h2>
                <div class="row">
                    @forelse($posts as $post)
                        <div class="last col-xs-12">
                            <span class="status status-{{ $post->status }}" style="float:left; margin-right:10px"></span>
                            <a href="{{ action('PostController@edit', $post) }}">{{ $post->title }}</a>
                        </div>
                    @empty
                        Aucun article dans la base de données.
                    @endforelse
                    <a class="btn btn-primary" href="{{ action('PostController@index') }}">Voir tous les articles</a>
                </div>
            </div>
        </section>

        <section class="col-xs-12 col-md-6">
            <h2>Derniers élèves</h2>
            <div class="row">
                @forelse($students as $student)
                    <div class="last col-xs-12">
                        <a href="{{ action('StudentController@edit', $student) }}">{{ $student->username }}</a>
                    </div>
                @empty
                    Aucun élève dans la base de données.
                @endforelse
                <a class="btn btn-primary" href="{{ action('StudentController@index') }}">Voir tous les élèves</a>
            </div>
        </section>
    </div>
@endsection