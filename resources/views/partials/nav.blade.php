<nav id="menu-haut">
    <div class="fb-like pull-right" data-href="https://www.facebook.com/lecolemultimedia" data-layout="button_count"
         data-action="like" data-size="small" data-show-faces="false" data-share="false"></div>
    <div class="pull-right" style="width:170px;">
        <a href="https://twitter.com/ecolemultimedia" class="twitter-follow-button" data-show-count="false"
           data-size="small" data-dnt="true">Follow @ecolemultimedia</a>
    </div>

</nav>
<nav id="menu-principal">
    <ul>
        <li id="logo" class="{{ Request::is('/') ? 'active': '' }}"><a href="{{ action('FrontController@index') }}">E-Lycée</a>
        </li>
        <li class="{{ Request::is('actualites') || Request::is('actualite*') ? 'active': '' }}"><a
                    href="{{action('FrontController@posts') }}">Actualités</a></li>
        <li class="{{ Request::is('lycee') ? 'active': '' }}"><a href="{{ action('FrontController@school') }}">Lycée</a>
        </li>
    </ul>
    <ul class="pull-right">
        <li>
            <form action="{{ action('FrontController@search') }}" method="get">
                <div class="input-group">
                    <input class="form-control" type="text" placeholder="Rechercher" name="q" required>
                    <span class="input-group-addon"><button><span class="glyphicon glyphicon-search"></span>
                        </button></span>
                </div>
                @if(isset($errors))
                    @if($errors->has('q')) <span class="error">{{ $errors->first('q') }}</span> @endif
                @endif
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
