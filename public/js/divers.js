

$(document).ready(function(){
    $('#searchform').submit(function(e){
        e.preventDefault();
        window.location.href="/search/"+e.target.elements[0].value;
    })
})

$(".affichPlaylists").click(function(){
    let nb = $(this).parent('div').attr('id');
    let etat = document.getElementById("listePlaylists"+nb).style.display;
    if(etat === "flex"){
        document.getElementById("listePlaylists"+nb).style.display = "none";
    } else {
        document.getElementById("listePlaylists"+nb).style.display = "flex";
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

var albums = ['Dawn'];
var trackNames = ['Skylike - Dawn'];
var trackUrl = ['https://raw.githubusercontent.com/himalayasingh/music-player-1/master/music/2.mp3'];


$(function()
{
    var playerTrack = $("#player-track"),
        bgArtwork = $('#bg-artwork'), bgArtworkUrl,
        albumName = $('#album-name'), trackName = $('#track-name'),
        albumArt = $('#album-art'), sArea = $('#s-area'), seekBar = $('#seek-bar'),
        trackTime = $('#track-time'), insTime = $('#ins-time'), sHover = $('#s-hover'),
        playPauseButton = $("#play-pause-button"),  i = playPauseButton.find('i'),
        tProgress = $('#current-time'), tTime = $('#track-length'), seekT, seekLoc, seekBarPos, cM, ctMinutes, ctSeconds, curMinutes, curSeconds, durMinutes, durSeconds, playProgress, bTime, nTime = 0, buffInterval = null, tFlag = false,
        albumArtworks = ['_1'],
        playPreviousTrackButton = $('#play-previous'),
        playNextTrackButton = $('#play-next'), currIndex = -1;

function selectTrack(flag)
{
    console.log("AA", trackUrl);
    if( flag == 0 || flag == 1 )
        ++currIndex;
    else
        --currIndex;
    if( (currIndex > -1) && (currIndex < albumArtworks.length) )
    {
        if( flag == 0 )
            i.attr('class','fa fa-play');
        else
        {
            albumArt.removeClass('buffering');
            i.attr('class','fa fa-pause');
        }

        seekBar.width(0);
        trackTime.removeClass('active');
        tProgress.text('00:00');
        tTime.text('00:00');

        currAlbum = albums[currIndex];
        currTrackName = trackNames[currIndex];
        currArtwork = albumArtworks[currIndex];

        audio.src = trackUrl[currIndex];

        nTime = 0;
        bTime = new Date();
        bTime = bTime.getTime();

        if(flag != 0)
        {
            audio.play();
            playerTrack.addClass('active');
            albumArt.addClass('active');

            clearInterval(buffInterval);
            checkBuffering();
        }

        albumName.text(currAlbum);
        trackName.text(currTrackName);
        albumArt.find('img.active').removeClass('active');
        $('#'+currArtwork).addClass('active');

        bgArtworkUrl = $('#'+currArtwork).attr('src');

        bgArtwork.css({'background-image':'url('+bgArtworkUrl+')'});
    }
    else
    {
        if( flag == 0 || flag == 1 )
            --currIndex;
        else
            ++currIndex;
    }
}



    function playPause()
    {
        setTimeout(function()
        {
            if(audio.paused)
            {
                playerTrack.addClass('active');
                albumArt.addClass('active');
                checkBuffering();
                i.attr('class','fas fa-pause');
                audio.play();
            }
            else
            {
                playerTrack.removeClass('active');
                albumArt.removeClass('active');
                clearInterval(buffInterval);
                albumArt.removeClass('buffering');
                i.attr('class','fas fa-play');
                audio.pause();
            }
        },300);
    }


    function showHover(event)
    {
        seekBarPos = sArea.offset();
        seekT = event.clientX - seekBarPos.left;
        seekLoc = audio.duration * (seekT / sArea.outerWidth());

        sHover.width(seekT);

        cM = seekLoc / 60;

        ctMinutes = Math.floor(cM);
        ctSeconds = Math.floor(seekLoc - ctMinutes * 60);

        if( (ctMinutes < 0) || (ctSeconds < 0) )
            return;

        if( (ctMinutes < 0) || (ctSeconds < 0) )
            return;

        if(ctMinutes < 10)
            ctMinutes = '0'+ctMinutes;
        if(ctSeconds < 10)
            ctSeconds = '0'+ctSeconds;

        if( isNaN(ctMinutes) || isNaN(ctSeconds) )
            insTime.text('--:--');
        else
            insTime.text(ctMinutes+':'+ctSeconds);

        insTime.css({'left':seekT,'margin-left':'-21px'}).fadeIn(0);

    }

    function hideHover()
    {
        sHover.width(0);
        insTime.text('00:00').css({'left':'0px','margin-left':'0px'}).fadeOut(0);
    }

    function playFromClickedPos()
    {
        audio.currentTime = seekLoc;
        seekBar.width(seekT);
        console.log(audio.currentTime);

        hideHover();
        console.log(audio.currentTime);

    }

    function updateCurrTime()
    {
        nTime = new Date();
        nTime = nTime.getTime();

        if( !tFlag )
        {
            tFlag = true;
            trackTime.addClass('active');
        }

        curMinutes = Math.floor(audio.currentTime / 60);
        curSeconds = Math.floor(audio.currentTime - curMinutes * 60);

        durMinutes = Math.floor(audio.duration / 60);
        durSeconds = Math.floor(audio.duration - durMinutes * 60);

        playProgress = (audio.currentTime / audio.duration) * 100;

        if(curMinutes < 10)
            curMinutes = '0'+curMinutes;
        if(curSeconds < 10)
            curSeconds = '0'+curSeconds;

        if(durMinutes < 10)
            durMinutes = '0'+durMinutes;
        if(durSeconds < 10)
            durSeconds = '0'+durSeconds;

        if( isNaN(curMinutes) || isNaN(curSeconds) )
            tProgress.text('00:00');
        else
            tProgress.text(curMinutes+':'+curSeconds);

        if( isNaN(durMinutes) || isNaN(durSeconds) )
            tTime.text('00:00');
        else
            tTime.text(durMinutes+':'+durSeconds);

        if( isNaN(curMinutes) || isNaN(curSeconds) || isNaN(durMinutes) || isNaN(durSeconds) )
            trackTime.removeClass('active');
        else
            trackTime.addClass('active');


        seekBar.width(playProgress+'%');

        if( playProgress == 100 )
        {
            i.attr('class','fa fa-play');
            seekBar.width(0);
            tProgress.text('00:00');
            albumArt.removeClass('buffering').removeClass('active');
            clearInterval(buffInterval);
        }
    }

    function checkBuffering()
    {
        clearInterval(buffInterval);
        buffInterval = setInterval(function()
        {
            if( (nTime == 0) || (bTime - nTime) > 1000  )
                albumArt.addClass('buffering');
            else
                albumArt.removeClass('buffering');

            bTime = new Date();
            bTime = bTime.getTime();

        },100);
    }


    function initPlayer()
    {
        audio = new Audio();

        selectTrack(0);

        audio.loop = false;

        playPauseButton.on('click',playPause);

        sArea.mousemove(function(event){ showHover(event); });

        sArea.mouseout(hideHover);

        sArea.on('click',playFromClickedPos);

        $(audio).on('timeupdate',updateCurrTime);

        playPreviousTrackButton.on('click',function(){ selectTrack(-1);} );
        playNextTrackButton.on('click',function(){ selectTrack(1);});
    }

    initPlayer();

    $("a.chanson").click(function(e){
        e.preventDefault();
        let url = $(this).attr('data-file');
        trackUrl[0] = url;
        albums[0] = $(this).attr('data-name');
        currIndex = -1;
        selectTrack(1);

    })
});