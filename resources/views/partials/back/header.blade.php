<header>
    <ul>
        <li><a href="{{ action('FrontController@index') }}" title="Retour au site public">Retour au site public</a></li>
        <li><p>Hello {{ Auth::user()->username }}</p><a href="{{ url('/logout') }}">Se déconnecter</a></li>
    </ul>
</header>