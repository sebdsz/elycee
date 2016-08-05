<div id="menu-haut">
    <div class="twitter">
        <a href="https://twitter.com/ecolemultimedia" class="twitter-follow-button" data-show-count="false"
           data-size="small" data-dnt="true">Follow @ecolemultimedia</a>
    </div>
    <div class="fb-like" data-href="https://www.facebook.com/lecolemultimedia" data-layout="button_count"
         data-action="like" data-size="small" data-show-faces="false" data-share="false"></div>
    <div class="connexion">

    <ul class="nav navbar-nav">
        <li>
            @if(!Auth::check())
                <a class="btn btn-default connexion" href="{{ url('login') }}">Connexion</a>
            @endif

            @if(Auth::check())
                @if(Auth::user()->isTeacher())
                    <a class="btn btn-primary" href="{{ action('BackController@index') }}">Administration</a>
                @else
                    <a class="btn btn-primary" href="{{ action('QCMController@dashboard') }}">Mon compte</a>
                @endif
            @endif
        </li>

    </ul >
    </div>
</div>
<nav id="menu-principal" class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <ul class="nav navbar-nav">
                <li id="logo"><a href="{{ action('FrontController@index') }}"><span class="eLogo">E</span>.Lycée</a></li>
            </ul>
        </div>
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li  class="{{ Request::is('/') ? 'active': '' }}"><a href="{{ action('FrontController@index') }}">Accueil</a>
                </li>
                <li class="{{ Request::is('actualites') || Request::is('actualite*') ? 'active': '' }}"><a
                            href="{{action('FrontController@posts') }}">Actualités</a></li>
                <li class="{{ Request::is('lycee') ? 'active': '' }}"><a href="{{ action('FrontController@school') }}">Lycée</a>
                </li>
            </ul>
            <form class="navbar-form pull-right" action="{{ action('FrontController@search') }}" method="get">


                <div class="input-group">
                    <input class="form-control" type="text" placeholder="Rechercher" name="q" required>
                    <span class="input-group-addon"><button><span class="glyphicon glyphicon-search"></span>
                        </button></span>
                </div>
                @if(isset($errors))
                    @if($errors->has('q')) <span class="error">{{ $errors->first('q') }}</span> @endif
                @endif
            </form>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>