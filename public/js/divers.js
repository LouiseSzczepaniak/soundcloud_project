

function onglet(x) {
    if(x == 1) {
        document.querySelector("#playlists").classList.add('is-visible');
        document.querySelector(".title1").classList.add('dark-color');
        document.querySelector(".title2").classList.remove('dark-color');
        document.querySelector("#playlists").classList.remove('is-invisible');
        document.querySelector("#chansons_uploadees").classList.remove('is-visible');
    }
    if(x == 2) {
        document.querySelector("#playlists").classList.remove('is-visible');
        document.querySelector(".title2").classList.add('dark-color');
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