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
        <a href="#modal"><div class="login"></div></a>
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
    <div class="remodal" data-remodal-id="modal" role="dialog" aria-labelledby="modal1Title" aria-describedby="modal1Desc">
  <button data-remodal-action="close" class="remodal-close" aria-label="Close"></button>
  <div>
    <h2 id="modal1Title">Remodal</h2>
    <p id="modal1Desc">
      Responsive, lightweight, fast, synchronized with CSS animations, fully customizable modal window plugin
      with declarative state notation and hash tracking.
    </p>
  </div>
  <br>
  <button data-remodal-action="cancel" class="remodal-cancel">Cancel</button>
  <button data-remodal-action="confirm" class="remodal-confirm">OK</button>
</div>

<div data-remodal-id="modal2" role="dialog" aria-labelledby="modal2Title" aria-describedby="modal2Desc">
  <div>
    <h2 id="modal2Title">Another one window</h2>
    <p id="modal2Desc">
      Hello!
    </p>
  </div>
  <br>
  <button data-remodal-action="confirm" class="remodal-confirm">Hello!</button>
</div>

<!-- You can define the global options -->
<script>
  // window.REMODAL_GLOBALS = {
  //   NAMESPACE: 'remodal',
  //   DEFAULTS: {
  //     hashTracking: true,
  //     closeOnConfirm: true,
  //     closeOnCancel: true,
  //     closeOnEscape: true,
  //     closeOnOutsideClick: true,
  //     modifier: ''
  //   }
  // };
</script>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script>window.jQuery || document.write('<script src="../libs/jquery/dist/jquery.min.js"><\/script>')</script>
<script src="../../js/app.js"></script>

<!-- Events -->
<script>
  $(document).on('opening', '.remodal', function () {
    console.log('opening');
  });

  $(document).on('opened', '.remodal', function () {
    console.log('opened');
  });

  $(document).on('closing', '.remodal', function (e) {
    console.log('closing' + (e.reason ? ', reason: ' + e.reason : ''));
  });

  $(document).on('closed', '.remodal', function (e) {
    console.log('closed' + (e.reason ? ', reason: ' + e.reason : ''));
  });

  $(document).on('confirmation', '.remodal', function () {
    console.log('confirmation');
  });

  $(document).on('cancellation', '.remodal', function () {
    console.log('cancellation');
  });

//  Usage:
//  $(function() {
//
//    // In this case the initialization function returns the already created instance
//    var inst = $('[data-remodal-id=modal]').remodal();
//
//    inst.open();
//    inst.close();
//    inst.getState();
//    inst.destroy();
//  });

  //  The second way to initialize:
  $('[data-remodal-id=modal2]').remodal({
    modifier: 'with-red-theme'
  });
</script>
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
<script src="../../../js/app.js"></script>
</html>
