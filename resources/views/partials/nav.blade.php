<nav id="menu-haut">
    <ul>
        <li id="logo"><img src="" alt="E-LYCEE LOGO"></li>
        <li>like (Facebook)</li>
        <li>Social Tag Facebook</li>
        <li>Social Tag Twitter</li>
        <li class="pull-right">
            @if(!Auth::check())
                <a class="btn btn-default" href="{{ url('login') }}">Connexion</a>
            @endif

            @if(Auth::check())
                @if(Auth::user()->isTeacher())
                    <a class="btn btn-default" href="{{ action('BackController@index') }}">Administration</a>
                @else
                    <a class="btn btn-default" href="{{ action('QCMController@dashboard') }}">Dashboard</a>
                @endif
            @endif
        </li>

    </ul>
</nav>
<nav id="menu-principal">
    <ul>
        <li><a class="btn" href="{{ action('FrontController@index') }}">Home</a></li>
        <li><a class="btn" href="{{action('FrontController@posts') }}">Actus</a></li>
        <li><a class="btn" href="{{ action('FrontController@school') }}">Lycée</a></li>
        <li>
            <form action="{{ action('FrontController@search') }}" method="get">
                <div class="input-group">
                    <input class="form-control" type="text" placeholder="Rechercher" name="q" required>
                    <span class="input-group-addon"><button>Rechercher</button></span>
                </div>
                @if($errors->has('q')) <span class="error">{{ $errors->first('q') }}</span> @endif
            </form>
        </li>
    </ul>
</nav>
