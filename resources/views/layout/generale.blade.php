<!DOCTYPE html>
<html>
<head>
    <meta charset='UTF-8'>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title> LISTEN & UPLOAD </title>
    <link type="text/css" rel="stylesheet" href="/css/style.css"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <script src="/js/jquery.js"></script>

    <script src="/js/popup.js"></script>
    <script src="/js/donneesplayer.js"></script>
</head>

<nav class="menu_principal" id="menu">
        <a href="/">
            <div class="logo"></div>
        </a>
        @auth
        <div class="icons">
            <a href="/utilisateur/{{Auth::id()}}"><div class="myaccount"></div></a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
        <a onclick="event.preventDefault();document.getElementById('logout-form').submit();"><div class="logout"></div>
        </a>
        </div>

       @endauth
</nav>

<body>
        @guest
        <div id='popup'>
            <div class="container">
                <div class='login' id='login'></div>
            </div>

            <div class="overlay">
            </div>

            <div class="main-popup">
                <div id="popup-close-button">
                    <a href="#"></a>
                </div>

                <div class="popup-header">
                    <ul>
                      <li>
                          <a href="#" id="sign-in">Sign In</a>
                      </li>
                      <li>
                          <a href="#" id="register">Register</a>
                      </li>
                    </ul>
                </div><!--.popup-header-->

                <div class="popup-content">
                    <div>
                        @include('auth.login')
                    </div>

                    <div>
                        @if(Route::has('register'))
                            @include('auth.register')
                        @endif
                    </div>
                </div><!--.popup-content-->
            </div><!--.main-popup-->
            @endguest
</div>



<div id="main">
    @yield('contenu')
</div>
<div id='all'>
    <div id="app-cover">

        <div id="player">
            <div id="player-track">
                <div id="album-name"></div>
                <div id="track-name"></div>
                <div id="track-time">
                    <div id="current-time"></div>
                    <div id="track-length"></div>
                </div>
                <div id="s-area">
                    <div id="ins-time"></div>
                    <div id="s-hover"></div>
                    <div id="seek-bar"></div>
                </div>
            </div>
            <div id="player-content">
                <div id="album-art">
                    <div class="imgTrack active" id="_1"></div>
                    <div class="fondTrack"></div>
                    <div id="buffer-box"></div>
                </div>
                <div id="player-controls">
                    <div class="control">
                        <div class="button" id="play-previous">
                            <i class="fas fa-backward"></i>
                        </div>
                    </div>
                    <div class="control">
                        <div class="button" id="play-pause-button">
                            <i class="fas fa-play"></i>
                        </div>
                    </div>
                    <div class="control">
                        <div class="button" id="play-next">
                            <i class="fas fa-forward"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
        </div>
        <script src="/js/divers.js"></script>
@yield('player')

    </body>
</html>
