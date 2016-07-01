<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'E-lycée')</title>
</head>
<body>
@include('partials.nav')
@yield('content')
@include('partials.sidebar')
@include('partials.footer')
</body>
</html>