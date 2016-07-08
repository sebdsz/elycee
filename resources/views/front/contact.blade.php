@extends('layouts.front')

@section('content')
    <h2>Page de contact du site</h2>

    <form action="" method="post">
        {{ csrf_field() }}
        <div class="form-group">
            <label for="email">Email</label>
            <input class="form-control" id="email" type="email" placeholder="Votre email" name="email">
        </div>
        <div class="form-group">
            <label for="subject">Sujet</label>
            <input class="form-control" type="text" name="subject" id="subject" placeholder="Votre sujet">
        </div>
        <div class="form-group">
            <label for="comment">Commentaire</label>
                <textarea class="form-control" name="comment" id="comment" cols="30" rows="10" placeholder="Votre commentaire ici..."></textarea>
        </div>
        <button class="btn btn-primary">Envoyer</button>
    </form>
@endsection