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
    
</head>
<nav class="menu_principal">
        <a href="/">
            <div class="logo"></div>
        </a>
</nav>
<body>
<div id='popup'>
<div class="container">
  <div class='login' id='login'></div>
</div>
<div class="overlay">
</div>

<div class="main-popup">
<div id="popup-close-button"><a href="#"></a></div>
    
  <div class="popup-header">
    
    <ul>
      <li><a href="#" id="sign-in">Sign In</a></li>
      <li><a href="#" id="register">Register</a></li>
    </ul>
  </div><!--.popup-header-->
<div class="popup-content">
    <form action="#" class="sign-in">
    @include('auth.login')
    </form>
   
    <form action="#" class="register">
    @if(Route::has('register'))
                @include('auth.register')
            
        @endif
    </form>
  </div><!--.popup-content-->
</div><!--.main-popup-->
</div>



<div id="main">
    @yield('contenu')
</div>
<!--
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
                    <img src="https://raw.githubusercontent.com/himalayasingh/music-player-1/master/img/_1.jpg" class="active" id="_1">
                    <img src="https://raw.githubusercontent.com/himalayasingh/music-player-1/master/img/_2.jpg" id="_2">
                    <img src="https://raw.githubusercontent.com/himalayasingh/music-player-1/master/img/_3.jpg" id="_3">
                    <img src="https://raw.githubusercontent.com/himalayasingh/music-player-1/master/img/_4.jpg" id="_4">
                    <img src="https://raw.githubusercontent.com/himalayasingh/music-player-1/master/img/_5.jpg" id="_5">
                    <div id="buffer-box">Buffering ...</div>
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
        </div> -->
<!--<audio id="audio" controls>
</audio>-->
<footer> Le pied de la page </footer>
{{$c->nom}}
<script src="/js/divers.js"></script>
@yield('player')
    </body> 
</html>
