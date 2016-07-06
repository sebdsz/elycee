<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'E-lycée')</title>
    <link rel="stylesheet" href="{{ url('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ url('css/main.css') }}">
</head>
<body>
@include('partials.nav')
<div class="container">
    <div class="row">
        <div class="col-xs-12 col-md-9">
            @yield('content')
        </div>
        <div class="col-xs-12 col-md-3 hidden-xs">
            @include('partials.sidebar')
        </div>
    </div>
</div>
@include('partials.footer')
<script src="{{ url('js/jquery1.min.js') }}"></script>
<script src="{{ url('js/main.js') }}"></script>
</body>
</html>