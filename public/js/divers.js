

function onglet(x) {
    if(x == 1) {
        document.querySelector("#playlists").classList.add('is-visible');
        document.querySelector(".title1").classList.add('dark-color');
        document.querySelector(".title2").classList.remove('dark-color');
        document.querySelector(".title2").classList.add('light-color');
        document.querySelector("#playlists").classList.remove('is-invisible');
        document.querySelector("#chansons_uploadees").classList.remove('is-visible');
    }
    if(x == 2) {
        document.querySelector("#playlists").classList.remove('is-visible');
        document.querySelector(".title2").classList.add('dark-color');
        document.querySelector(".title1").classList.remove('dark-color');
        document.querySelector(".title1").classList.add('light-color');
        document.querySelector("#playlists").classList.add('is-invisible');
        document.querySelector("#chansons_uploadees").classList.add('is-visible');
    }
}

$(document).ready(function(){
    $('#searchform').submit(function(e){
        e.preventDefault();
        window.location.href="/search/"+e.target.elements[0].value;
    })
})

$(".affichPlaylists").click(function(){
    let nb = parseInt($(this).parent('div').attr('id'));
    let nbTotal = $(".nbListePlaylist").attr('id');
    let etat = document.getElementById("listePlaylists"+nb).style.display;
    for(let i=1; i <nbTotal; i++){
        if(i === nb){
            if(etat === "flex"){
                document.getElementById("listePlaylists"+nb).style.display = "none";
            } else {
                document.getElementById("listePlaylists"+nb).style.display = "flex";
            }
        } else{
            document.getElementById("listePlaylists"+i).style.display = "none";
        }
    }
})

$(".bouton_nouvelle_playlist").click(function(){
    let etatplaylist = document.getElementById("nouvelle_playlist").style.display;
    if(etatplaylist === "flex"){
        document.getElementById("nouvelle_playlist").style.display = "none";
    } else {
        document.getElementById("nouvelle_playlist").style.display = "flex";
    }
})

/*Title: Cool Modal Popup Sign In/Out Form*/

$(function() {
  //defining all needed variables
  var $bouton = $('.login');
  var $overlay = $('.overlay');
  var $mainPopUp = $('.main-popup')
  var $signIn = $('#sign-in');
  var $register = $('#register');
  var $formSignIn = $('form.sign-in');
  var $formRegister = $('form.register');

  var $firstChild = $('nav ul li:first-child');
  var $secondChild = $('nav ul li:nth-child(2)');
  var $thirdChild = $('nav ul li:nth-child(3)');

  //defining function to create underline initial state on document load
  function initialState() {
    $('.underline').css({
      "width": $firstChild.width(),
      "left": $firstChild.position().left,
      "top": $firstChild.position().top + $firstChild.outerHeight(true) + 'px'
    });
  }
  initialState(); //() used after calling function to call function immediately on doc load

  //defining function to change underline depending on which li is active
  function changeUnderline(el) {
    $('.underline').css({
      "width": el.width(),
      "left": el.position().left,
      "top": el.position().top + el.outerHeight(true) + 'px'
    });
  } //note: have not called the function...don't want it called immediately

  $firstChild.on('click', function(){
    var el = $firstChild;
    changeUnderline(el); //call the changeUnderline function with el as the perameter within the called function
    $secondChild.removeClass('active');
    $thirdChild.removeClass('active');
    $(this).addClass('active');
  });

  $secondChild.on('click', function(){
    var el = $secondChild;
    changeUnderline(el); //call the changeUnderline function with el as the perameter within the called function
    $firstChild.removeClass('active');
    $thirdChild.removeClass('active');
    $(this).addClass('active');
  });

  $thirdChild.on('click', function(){
    var el = $thirdChild;
    changeUnderline(el); //call the changeUnderline function with el as the perameter within the called function
    $firstChild.removeClass('active');
    $secondChild.removeClass('active');
    $(this).addClass('active');
  });


  $bouton.on('click', function(){
    $overlay.addClass('visible');
    $mainPopUp.addClass('visible');
    $signIn.addClass('active');
    $register.removeClass('active');
    $formRegister.removeClass('move-left');
    $formSignIn.removeClass('move-left');
  });
  $overlay.on('click', function(){
    $(this).removeClass('visible');
    $mainPopUp.removeClass('visible');
  });
  $('#popup-close-button a').on('click', function(e){
    e.preventDefault();
    $overlay.removeClass('visible');
    $mainPopUp.removeClass('visible');
  });

  $signIn.on('click', function(){
    $signIn.addClass('active');
    $register.removeClass('active');
    $formSignIn.removeClass('move-left');
    $formRegister.removeClass('move-left');
  });

  $register.on('click', function(){
    $signIn.removeClass('active');
    $register.addClass('active');
    $formSignIn.addClass('move-left');
    $formRegister.addClass('move-left');
  });

  $('input').on('submit', function(e){
    e.preventDefault(); //used to prevent submission of form...remove for real use
  });
});

/* MENU */
window.onscroll = function() {scrollFunction()};

function scrollFunction() {
  if (document.body.scrollTop > 80 || document.documentElement.scrollTop > 80) {
    document.querySelector('#menu').classList.add('small-menu');
    document.querySelector('.logo').classList.add('small-logo');
    document.querySelector('.login').classList.add('small-icon');
  } else {
    document.querySelector('#menu').classList.remove('small-menu');
    document.querySelector('.logo').classList.remove('small-logo');
    document.querySelector('.login').classList.remove('small-icon');
  }
}
/* FIN MENU */

class TextGlitch {
	constructor( root ) {
		this._root = root;
		this._elClips = root.querySelectorAll( ".TextGlitch-clip" );
		this._elWords = root.querySelectorAll( ".TextGlitch-word" );
		this._frame = this._frame.bind( this );
		this._unglitch = this._unglitch.bind( this );
		this._frameId = null;
		this._text = "";
		this._textAlt = [];
		Object.seal( this );

		this.setTexts( [
			"Hello World !",
			"hELLO wORLD .",
			"ɥǝ˥˥0 M0ᴚ˥p ¡",
			"µΞ11Θ ∑θrlb ¡",
			"こんにちは 世界国地球 ¡",
		] );
	}

	on() {
		if ( !this._frameId ) {
			this._frame();
		}
	}
	off() {
		clearTimeout( this._frameId );
		this._frameId = null;
		this._unglitch();
	}
	setTexts( [ text, ...alt ] ) {
		this._text = text;
		this._textAlt = alt;
	}

	// private:
	// .....................................................................
	_frame() {
		this._glitch();
		setTimeout( this._unglitch, 50 + Math.random() * 200 );
		this._frameId = setTimeout( this._frame, 250 + Math.random() * 500 );
	}
	_glitch() {
		this._addClipCSS();
		this._textContent( this._randText() );
		this._root.classList.add( "TextGlitch-blended" );
	}
	_unglitch() {
		this._removeClipCSS();
		this._textContent( this._text );
		this._root.classList.remove( "TextGlitch-blended" );
	}
	_textContent( txt ) {
		this._elWords.forEach( el => el.textContent = txt );
	}

	// CSS clip-path, to cut the letters like an overflow:hidden
	// .....................................................................
	_addClipCSS() {
		const clips = this._elClips,
			clip1 = this._randDouble( .1 ),
			clip2 = this._randDouble( .1 );

		clips.forEach( el => {
			const x = this._randDouble( .3 ),
				y = this._randDouble( .1 );

			el.style.transform = `translate(${ x }em, ${ y }em)`;
		} );
		clips[ 0 ].style.clipPath = `inset( 0 0 ${ .6 + clip1 }em 0 )`;
		clips[ 1 ].style.clipPath = `inset( ${ .4 - clip1 }em 0 ${ .3 - clip2 }em 0 )`;
		clips[ 2 ].style.clipPath = `inset( ${ .7 + clip2 }em 0 0 0 )`;
	}
	_removeClipCSS() {
		this._elClips.forEach( el => {
			el.style.clipPath =
			el.style.transform = "";
		} );
	}

	// Switch some chars randomly
	// .....................................................................
	_randText() {
		const txt = Array.from( this._text );

		for ( let i = 0; i < 6; ++i ) {
			const ind = this._randInt( this._text.length );

			txt[ ind ] = this._textAlt[ this._randInt( this._textAlt.length ) ][ ind ];
		}
		return txt.join( "" );
	}

	// rand utils
	// .....................................................................
	_randDouble( d ) {
		return Math.random() * d - d / 2;
	}
	_randInt( n ) {
		return Math.random() * n | 0;
	}
}

const elTitle = document.querySelector( "#title" );
const glitch = new TextGlitch( elTitle );

glitch.on();