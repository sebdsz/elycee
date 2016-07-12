<header class="navbar navbar-fixed-top">
    <ul class="nav navbar-nav pull-left">
        <li id="logo">
            <a href="{{ action('FrontController@index') }}" title="Retour au site public">E-Lycée</a>
        </li>
    </ul>
    <ul class="nav navbar-nav pull-right">
        <li>
            <p class="navbar-text">Bonjour {{ Auth::user()->username }} <a href="{{ url('/logout') }}" class="navbar-link btn btn-default">Se déconnecter</a></p>
        </li>
    </ul>
</header>