@extends('layouts.front')

@section('content')
    <h2>Page de contact du site</h2>

    <form action="" method="post">
        <label for="email">Email</label>
        <input id="email" type="email" placeholder="Votre email" name="email">

        <label for="subject">Sujet</label>
        <input type="text" name="subject" id="subject" placeholder="Votre sujet">

        <label for="comment">Commentaire</label>
        <textarea name="comment" id="comment" cols="30" rows="10" placeholder="Votre commentaire ici..."></textarea>

        <button>Envoyer</button>
    </form>
@endsection