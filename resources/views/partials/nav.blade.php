<nav id="menu-haut">
    <ul>
        <li>Facebook</li>
        @if(!Auth::check())
            <li><a href="{{ url('login') }}">Connexion</a></li>
        @endif

        @if(Auth::check())
            @if(Auth::user()->isTeacher())
                <li><a href="{{ action('BackController@index') }}">Administration</a></li>
            @else
                <li><a href="{{ action('QCMController@dashboard') }}">Dashboard</a></li>
            @endif
        @endif
        <li>Social Tag Facebook</li>
        <li>Social Tag Twitter</li>
    </ul>
</nav>
<nav id="menu-principal">
    <ul>
        <li><a href="{{ action('FrontController@index') }}">Home</a></li>
        <li><a href="{{action('FrontController@posts') }}">Actus</a></li>
        <li><a href="{{ action('FrontController@school') }}">Lycée</a></li>
        <li>
            <form action="{{ action('FrontController@search') }}" method="get">
                <input type="text" placeholder="Rechercher" name="q" required>
                @if($errors->has('q')) <span class="error">{{ $errors->first('q') }}</span> @endif
                <button>Rechercher</button>
            </form>
        </li>
    </ul>
</nav>