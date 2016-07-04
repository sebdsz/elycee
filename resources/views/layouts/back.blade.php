<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'E-lycée - Backoffice')</title>
    <link rel="stylesheet" href="{{ url('css/bootstrap.min.css') }}">
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
</body>
</html>