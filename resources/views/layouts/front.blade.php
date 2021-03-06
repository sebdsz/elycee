<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="_token" content="{{ csrf_token() }}"/>
    <title>@yield('title', 'E-lycée')</title>
    <link rel="stylesheet" href="{{ url('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ url('css/jquery-confirm.min.css') }}">
    <link rel="stylesheet" href="{{ url('css/main.min.css') }}">
    <link href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,300italic,100italic,400italic,700,900,500' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Poiret+One' rel='stylesheet' type='text/css'>
    <script async src="//platform.twitter.com/widgets.js" charset="utf-8"></script>
</head>
<body>
@include('partials.nav')
<div class="container">
    <div class="row">
        <div class="col-xs-12 col-md-9">
            @yield('content')
        </div>
        <div id="sidebar" class="col-xs-12 col-md-3 hidden-xs">
            @include('partials.sidebar')
        </div>
    </div>
</div>
@include('partials.footer')
<div id="fb-root"></div>
<script src="{{ url('js/jquery1.min.js') }}"></script>
<script src="{{ url('js/jquery-confirm.min.js') }}"></script>
<script src="{{ url('js/bootstrap.min.js') }}"></script>
<script src="{{ url('js/main.js') }}"></script>
@yield('scripts')
</body>
</html>