@extends('layouts.back')

@section('content')
    <div class="bg">
        <h3>Nouvel élève</h3>
        @if(Session::has('message'))
            @include('partials.back.message')
        @endif

        <form action="{{ action('StudentController@store') }}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="username">Identifiant</label>
                <input id="username" class="form-control" type="text" value="{{ old('username') }}" name="username"
                       placeholder="L'identifiant de l'élève" required>
                @if($errors->has('title')) <span class="error">{{ $errors->first('username') }}</span> @endif
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" name="email" id="email" value="{{ old('email') }}"
                       placeholder="L'email de l'élève">
                @if($errors->has('email')) <span class="error">{{ $errors->first('email') }}</span> @endif
            </div>
            <div class="form-group">
                <label for="role">Classe</label>
                <select class="form-control" name="role" id="role" required>
                    <option value="first_class">Première S</option>
                    <option value="final_class">Terminale S</option>
                </select>
                @if($errors->has('role')) <span class="error">{{ $errors->first('role') }}</span> @endif
            </div>
            <button class="btn btn-success">Ajouter</button>
        </form>
    </div>
@endsection