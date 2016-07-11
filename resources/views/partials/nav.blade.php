<nav id="menu-haut">
    <ul class="pull-right">
        <li><a href="">like (Facebook)</a></li>
        <li><a href="">Social Tag Facebook</a></li>
        <li><a href="">Social Tag Twitter</a></li>
    </ul>
</nav>
<nav id="menu-principal">
    <ul>
        <li id="logo"><a href="{{ action('FrontController@index') }}">E-Lycée</a></li>
        <li><a href="{{action('FrontController@posts') }}">Actualités</a></li>
        <li><a href="{{ action('FrontController@school') }}">Lycée</a></li>
    </ul>
    <ul class="pull-right">
        <li>
            <form action="{{ action('FrontController@search') }}" method="get">
                <div class="input-group">
                    <input class="form-control" type="text" placeholder="Rechercher" name="q" required>
                    <span class="input-group-addon"><button><span class="glyphicon glyphicon-search"></span>
                        </button></span>
                </div>
                @if($errors->has('q')) <span class="error">{{ $errors->first('q') }}</span> @endif
            </form>
        </li>
        <li>
            @if(!Auth::check())
                <a class="btn btn-default" href="{{ url('login') }}">Connexion</a>
            @endif

            @if(Auth::check())
                @if(Auth::user()->isTeacher())
                    <a class="btn btn-primary" href="{{ action('BackController@index') }}">Administration</a>
                @else
                    <a class="btn btn-primary" href="{{ action('QCMController@dashboard') }}">Mon compte</a>
                @endif
            @endif
        </li>
    </ul>
</nav>
