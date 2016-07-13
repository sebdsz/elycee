<nav class="sidebar-left">
    <ul>
        <li class="{{ Request::is('etudiant') ? 'active': '' }}"><a href="{{ action('QCMController@dashboard') }}"><span class="glyphicon glyphicon-stats"></span> Dashboard</a></li>
        <li class="{{ Request::is('etudiant/liste') || Request::is('etudiant/fiche*') ? 'active': '' }}"><a href="{{ action('QCMController@index') }}"><span class="glyphicon glyphicon-education"></span> Questions</a></li>
    </ul>
</nav>