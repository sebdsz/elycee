<header class="navbar navbar-default navbar-fixed-top">
    <div class="container-fluid">
        <ul class="nav navbar-nav pull-left">
            <li>
                <p class="navbar-text"><a href="{{ action('FrontController@index') }}" title="Retour au site public" class="btn btn-default">Retour au site public</a></p>
            </li>
        </ul>
        <ul class="nav navbar-nav pull-right">
            <li>
                <p class="navbar-text">Bonjour {{ Auth::user()->username }} <a href="{{ url('/logout') }}" class="navbar-link btn btn-default">Se déconnecter</a></p>
            </li>
        </ul>
    </div>
</header>