<!DOCTYPE html>
<html>
<head>
    <meta charset='UTF-8'>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title> LISTEN & UPLOAD </title>
    <link type="text/css" rel="stylesheet" href="/css/style.css"/>
</head>

<body>
<header>
    <nav class="menu_principal">
        <a href="/">
            <div class="logo"></div>
        </a>
        @guest
        <div class="login"></div>
        @else
            <div class="icons">
                <a href="/utilisateur/{{Auth::user()->id}}" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                    <div class="myaccount"></div> <span class="caret"></span>
                </a>

                <a href="{{ route('logout') }}"
                   onclick="event.preventDefault();
                                              document.getElementById('logout-form').submit();"> <div class="logout"></div> </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </div>
        @endguest
      <!--  <div class="login"></div>-->
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
    @yield('contenu')
</div>

<audio id="audio" controls>
</audio>
<footer> Le pied de la page </footer>
</body>
<script src="/js/jquery.js"></script>
<script src="/js/divers.js"></script>
</html>
