<nav id="menu-haut">
    <ul>
        <li>Facebook</li>
        @if(!Auth::check())
            <li><a href="{{ url('login') }}">Connexion</a></li>
        @else
            <li>Administration</li>
        @endif
        <li>Social Tag Facebook</li>
        <li>Social Tag Twitter</li>
    </ul>
</nav>
<nav id="menu-principal">
    <ul>
        <li><a href="{{ action('FrontController@index') }}">Home</a></li>
        <li><a href="{{action('FrontController@posts') }}">Actus</a></li>
        <li><a href="">Lycée</a></li>
        <li>
            <form action="" method="get">
                <input type="text" placeholder="Rechercher" name="q">
                <button>Rechercher</button>
            </form>
        </li>
    </ul>
</nav>