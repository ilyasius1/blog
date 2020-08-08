<header class="header  push-down-45">
    <div class="container">
        <div class="logo pull-left">
            <a href="/">
                <img src="/assets/images/logo.png" alt="Logo" width="352" height="140">
            </a>
        </div>
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#readable-navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>
        <nav class="navbar navbar-default" role="navigation">
            <div class="collapse  navbar-collapse" id="readable-navbar-collapse">
                <ul class="navigation">
                    <li class="dropdown{{ (isset($activemenu) && $activemenu == 'main') ? ' active': '' }}">
                        <a href="/" class="dropdown-toggle" data-toggle="dropdown">Главная</a>
                    </li>
                    <li class="dropdown {{ (isset($activemenu) && $activemenu == 'test') ? ' active': '' }}">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Тест</a>
                        <ul class="navigation__dropdown">
                            <li><a href="#">Пункт 1</a></li>
                            <li><a href="#">Пункт 2</a></li>
                            <li><a href="#">Пункт 3</a></li>
                            <li><a href="#">Пункт 4</a></li>
                        </ul>
                    </li>
                    <li class="{{ (isset($activemenu) && $activemenu == 'create') ? ' active': '' }}">
                        <a href="{{ route('post.create') }}" class="dropdown-toggle" data-toggle="dropdown">Создать</a>
                    </li>
                    <li class="{{ (isset($activemenu) && $activemenu == 'test') ? ' active': '' }}">
                        <a href="/about" class="dropdown-toggle" data-toggle="dropdown">Обо мне</a>
                    </li>
                    <li class="{{ (isset($activemenu) && $activemenu == 'test') ? ' active': '' }}">
                        <a href="/contact" class="dropdown-toggle" data-toggle="dropdown">Обратная связь</a>
                    </li>
                    @auth()
                        <li>
                            <a href="#">{{ \Illuminate\Support\Facades\Auth::user()->username }}</a>
                        </li>
                        <li>
                            <button formaction="{{ route('logout') }}" formmethod="post">Выход</button>
                        </li>
                    @elseauth()
                    <li class="{{ (isset($activemenu) && $activemenu == 'register') ? ' active': '' }}">
                        <a href="/register" class="dropdown-toggle" data-toggle="dropdown">Регистрация</a>
                    </li>
                    <li class="{{ (isset($activemenu) && $activemenu == 'login') ? ' active': '' }}">
                        <a href="/login" class="dropdown-toggle" data-toggle="dropdown">Вход</a>
                    </li>
                    @endauth
                </ul>
            </div>
        </nav>
        <div class="hidden-xs hidden-sm">
            <a href="#" class="search__container  js--toggle-search-mode"> <span class="glyphicon  glyphicon-search"></span> </a>
        </div>
    </div>
</header>
