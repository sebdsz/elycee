<nav class="sidebar-left">
    <ul>
        <li class="{{ Request::is('etudiant') ? 'active': '' }}"><a href="{{ action('QCMController@dashboard') }}">Dashboard</a></li>
        <li class="{{ Request::is('etudiant/liste') || Request::is('etudiant/fiche*') ? 'active': '' }}"><a href="{{ action('QCMController@index') }}">Questions</a></li>
    </ul>
</nav>