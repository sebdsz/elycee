@extends('layouts.back')

@section('content')
    <div>
        <h2>{{ $student->username }}</h2>
        @if(!is_null($student->score()) )
            <p>Sa moyenne est de {{ $student->scoreAverage(20) }}/20
                avec {{ $student->madeQCM() }} {{ trans_choice('site.qcm_finish', $student->madeQCM()) }}
                . {{ $student->isNumber() }}</p>
        @endif


        @if(Session::has('message'))
            @include('partials.back.message')
        @endif

        <form action="{{ action('StudentController@update', $student) }}" method="post" enctype="multipart/form-data">
            {{ method_field('PUT') }}
            {{ csrf_field() }}
            <div class="form-group">
                <label for="username">Identifiant</label>
                <input id="username" class="form-control" type="text" value="{{ $student->username }}" name="username"
                       placeholder="L'identifiant de l'élève" required>
                @if($errors->has('title')) <span class="error">{{ $errors->first('username') }}</span> @endif
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" name="email" id="email" value="{{ $student->email }}">
                @if($errors->has('email')) <span class="error">{{ $errors->first('email') }}</span> @endif
            </div>
            <div class="form-group">
                <label for="role">Classe</label>
                <select class="form-control" name="role" id="role" required>
                    <option value="first_class" @if($student->role === 'first_class') selected @endif>Première S
                    </option>
                    <option value="final_class" @if($student->role === 'final_class') selected @endif>Terminale S
                    </option>
                </select>
                @if($errors->has('role')) <span class="error">{{ $errors->first('role') }}</span> @endif
            </div>
            <button class="btn btn-success">Modifier</button>
        </form>
    </div>
@endsection