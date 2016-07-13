<nav class="sidebar-left">
    <ul>
        <li class="{{ Request::is('admin') ? 'active': '' }}"><a href="{{ action('BackController@index') }}"><span class="glyphicon glyphicon-stats"></span> Dashboard</a></li>
        <li class="{{ Request::is('admin/fiches*') || Request::is('admin/questions*') ? 'active': '' }}"><a href="{{ action('RecordController@index') }}"><span class="glyphicon glyphicon-education"></span> Questions</a></li>
        <li class="{{ Request::is('admin/articles*') ? 'active': '' }}"><a href="{{ action('PostController@index') }}"><span class="glyphicon glyphicon-file"></span> Articles</a></li>
        <li class="{{ Request::is('admin/eleves*') ? 'active': '' }}"><a href="{{ action('StudentController@index') }}"><span class="glyphicon glyphicon-user"></span> Élèves</a></li>
    </ul>
</nav>