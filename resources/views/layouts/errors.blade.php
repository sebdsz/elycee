<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="_token" content="{{ csrf_token() }}"/>
    <title>@yield('title', 'E-lycée - 404 error')</title>
    <link rel="stylesheet" href="{{ url('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ url('css/main.min.css') }}">
    <link href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,300italic,100italic,400italic,700,900,500' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Poiret+One' rel='stylesheet' type='text/css'>
</head>
<body>

@include('partials.nav')
<div class="container">
    <div class="row">
        <div class="col-xs-12">
            @yield('content')
        </div>
    </div>
</div>
@include('partials.footer')
<script src="{{ url('js/jquery1.min.js') }}"></script>
<script src="{{ url('js/jquery-confirm.min.js') }}"></script>
<script src="{{ url('js/main.js') }}"></script>
</body>
</html>