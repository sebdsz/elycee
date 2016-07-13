@extends('layouts.back')

@section('content')
    <div class="bg">
        <h2>{!! $record->content !!}</h2>

        <div class="row">
            <div class="col-xs-12">
                <form class="pull-right" action="{{ action('ChoiceController@store', $record->id) }}" method="post">
                    {{ csrf_field() }}
                    <button class="btn btn-primary">Ajouter un nouveau choix</button>
                </form>
            </div>
        </div>

        @if(Session::has('message'))
            @include('partials.back.message')
        @endif


        <div class="row">
            <form class="col-xs-12" action="{{ action('ChoiceController@update', $record) }}" method="post"
                  enctype="multipart/form-data">
                {{ method_field('PUT') }}
                {{ csrf_field() }}

                @foreach($record->choices as $index => $choice)

                    <div class="form-group">
                        <label>Choix {{ $index+1 }}</label>
                        <input type="hidden" value="{{ $choice->id }}" name="id[]">
                        <div class="input-group">
                            <input type="text" name="content[]" class="form-control" value="{{ $choice->content }}">
                            <input type="hidden" name="status[{{ $index }}]" value="0">
                    <span class="input-group-addon">
                        <input type="checkbox" id="yes-{{$index}}" name="status[{{ $index }}]" value="1"
                               @if($choice->status) checked @endif>
                    <label for="yes-{{$index}}">Vrai</label></span>

                        </div>
                        @if($errors->has('choices')) <span
                                class="error">{{ $errors->first('class_level') }}</span> @endif
                    </div>

                @endforeach

                <button class="btn btn-success">Modifier</button>

            </form>
        </div>
    </div>
@endsection