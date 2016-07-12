@extends('layouts.errors')

@section('content')
    <div class="page-404">
        <div>
            <h2>Page 404</h2>
            <h4>Cette page n'existe pas ou n'existe plus...</h4>
            <div class="row">
                <div class="col-xs-12">
                    <a class="btn btn-primary" href="{{ url('/') }}">Retour au site</a>
                </div>
            </div>
        </div>
    </div>
@endsection