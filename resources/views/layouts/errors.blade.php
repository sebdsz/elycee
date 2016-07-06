<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="_token" content="{{ csrf_token() }}"/>
    <title>@yield('title', 'E-lycée - 404 error')</title>
    <link rel="stylesheet" href="{{ url('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ url('css/jquery-confirm.min.css') }}">
    <link rel="stylesheet" href="{{ url('css/main.css') }}">
</head>
<body>

<div class="container">
    <div class="row">
        <div class="col-xs-12 col-md-12">
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