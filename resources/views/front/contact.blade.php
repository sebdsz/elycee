@extends('layouts.front')

@section('content')
    <h2>Nous contacter</h2>
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci, animi architecto autem cum debitis dolorum
        facere modi quae qui reprehenderit sint vero. Animi aut blanditiis consectetur cum iure, minima modi molestiae
        molestias obcaecati officiis quae, quas rem sequi similique sit suscipit unde vel voluptatibus. A accusamus
        accusantium consectetur deleniti dolorum, excepturi explicabo facere laboriosam nesciunt nostrum numquam
        officiis omnis pariatur quasi quibusdam repellendus reprehenderit, veritatis. Adipisci commodi deleniti impedit
        ipsum molestias nam nisi, optio repudiandae soluta veniam. Beatae, consequuntur cupiditate, distinctio dolores
        dolorum exercitationem explicabo ipsam laboriosam, magnam nihil nobis nulla officia pariatur perferendis quae
        quis saepe veniam voluptatum. Dolor!</p>
    <div class="row">
        <div class="col-xs-12">
            @if(Session::has('message'))
                @include('partials.back.message')
            @endif
        </div>
    </div>

    <form action="" method="post">
        {{ csrf_field() }}
        <div class="form-group">
            <label for="email">Email</label>
            <input class="form-control" id="email" type="email" placeholder="Votre email" name="email"
                   value="{{ old('email') }}">
            @if($errors->has('email')) <span class="error">{{ $errors->first('email') }}</span> @endif
        </div>
        <div class="form-group">
            <label for="subject">Sujet</label>
            <input class="form-control" type="text" name="subject" id="subject" placeholder="Votre sujet"
                   value="{{ old('subject') }}">
            @if($errors->has('subject')) <span class="error">{{ $errors->first('subject') }}</span> @endif
        </div>
        <div class="form-group">
            <label for="comment">Commentaire</label>
            <textarea class="form-control" name="comment" id="comment" cols="30" rows="10"
                      placeholder="Votre commentaire ici...">{{ old('comment') }}</textarea>
            @if($errors->has('comment')) <span class="error">{{ $errors->first('comment') }}</span> @endif
        </div>
        <button class="send">Envoyer</button>
    </form>
@endsection