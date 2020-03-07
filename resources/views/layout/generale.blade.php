<!DOCTYPE html>
<html>
    <head>
        <meta charset='UTF-8'>
        <meta name="csrf-token" content="{{ csrf_token() }}" />
        <title> Listen and cloud </title>
        <link type="text/css" rel="stylesheet" href="/css/style.css"/>
    </head>

    <body>
        <header>
            <nav class="menu_principal">
                <li>
                    <a href="/">
                        <div class="logo"></div>
                    </a>
                </li>
                @guest

                @else
                    <li>
                        <a href="/utilisateur/{{Auth::user()->id}}" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                              document.getElementById('logout-form').submit();"> Déconnexion </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </li>
                @endguest
                <div class="login"></div>
            </nav>
        </header>

        <div class="modal">
            @guest
                <div class="connexion">
                    @include('auth.login')
                </div>
                @if(Route::has('register'))
                    <div class="inscription">
                        @include('auth.register')
                    </div>
                @endif
            @endguest
        </div>

        <div id="main">
            <div class="background-img">
                @yield('contenu')
            </div>

        </div>

        <audio id="audio" controls>
        </audio>
        <footer> Le pied de la page </footer>
    </body>
        <script src="/js/jquery.js"></script>
        <script src="/js/divers.js"></script>
</html>
