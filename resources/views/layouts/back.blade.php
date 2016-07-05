<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="_token" content="{{ csrf_token() }}"/>
    <title>@yield('title', 'E-lycée - Backoffice')</title>
    <link rel="stylesheet" href="{{ url('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ url('css/jquery-confirm.min.css') }}">
    <link rel="stylesheet" href="{{ url('css/back.css') }}">
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
<script src="{{ url('js/jquery3.min.js') }}"></script>
<script src="{{ url('js/jquery-confirm.min.js') }}"></script>
<script src="{{ url('js/back.js') }}"></script>
</body>
</html>