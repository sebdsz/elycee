<nav class="sidebar-left">
    <ul>
        <li class="{{ Request::is('admin')? 'active': '' }}"><a href="{{ action('BackController@index') }}">Dashboard</a></li>
        <li class="{{ Request::is('admin/fiches*')? 'active': '' }}"><a href="{{ action('RecordController@index') }}">QCM</a></li>
        <li class="{{ Request::is('admin/articles*')? 'active': '' }}"><a href="{{ action('PostController@index') }}">Articles</a></li>
        <li class="{{ Request::is('admin/eleves*')? 'active': '' }}"><a href="{{ action('StudentController@index') }}">Élèves</a></li>
    </ul>
</nav>