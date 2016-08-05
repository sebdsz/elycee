<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="_token" content="{{ csrf_token() }}"/>
    <title>@yield('title', 'E-lycée - Backoffice')</title>
    <link rel="stylesheet" href="{{ url('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ url('css/jquery-confirm.min.css') }}">
    <link rel="stylesheet" href="{{ url('plugins/datepickr/css/bootstrap-datepicker3.min.css') }}">
    <link rel="stylesheet" href="{{ url('css/back.min.css') }}">
    <link href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,300italic,100italic,400italic,700,900,500' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Poiret+One' rel='stylesheet' type='text/css'>
</head>
<body>
@include('partials.back.header')
@if(Auth::user()->isTeacher())
    @include('partials.back.nav')
@else
    @include('partials.back.nav-student')
@endif
<div class="container">
    @yield('content')
</div>
<script src="{{ url('js/jquery1.min.js') }}"></script>
<script src="{{ url('js/jquery-confirm.min.js') }}"></script>
<script src="{{ url('plugins/tinymce/tinymce.min.js') }}"></script>
<script src="{{ url('plugins/datepickr/js/bootstrap-datepicker.min.js') }}"></script>
<script src="{{ url('plugins/datepickr/locales/bootstrap-datepicker.fr.min.js') }}"></script>
<script src="{{ url('js/back.js') }}"></script>
</body>
</html>