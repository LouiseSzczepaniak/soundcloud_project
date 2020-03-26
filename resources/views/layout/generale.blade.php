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
        <div class="container">
  <div class="login"></div>
</div>
<div class="overlay">
</div>
<div class="main-popup">
  <div class="popup-header">
    <div id="popup-close-button"><a href="#"></a></div>
    <ul>
      <li><a href="#" id="sign-in">sign in</a></li>
      <li><a href="#" id="register">register</a></li>
    </ul>
  </div><!--.popup-header-->
  <div class="popup-content">
    <form action="#" class="sign-in">
    @include('auth.login')
    </form>
   
    <form action="#" class="register">
    @include('auth.register')
    </form>
  </div><!--.popup-content-->
</div><!--.main-popup-->
       <div class="login"></div></div>
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


    @guest
    
    

           
        
        @if(Route::has('register'))
            <div class="inscription">
                @include('auth.register')
            </div>
        @endif
    @endguest


<div id="main">
    @yield('contenu')
</div>

<audio id="audio" controls>
</audio>
<footer> Le pied de la page </footer>
</body>
<script src="/js/jquery.js"></script>
<script src="/js/divers.js"></script>
<script src="/js/remodal.js"></script>
<script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
</html>
