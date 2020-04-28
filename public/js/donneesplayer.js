function playEgaliseur(){
    for(let i=1; i <17; i++){
        $("#egaliseur"+currIndex+">g>.rect"+i).removeClass("rectDebutCache");
    }

    function firstVague(){
        for(let j=16; j>11; j--){
            $("#egaliseur"+currIndex+">#pic1>.rect"+j).addClass("firstVague");
        }

        for(let j=16; j>14; j--){
            $("#egaliseur"+currIndex+">#pic2>.rect"+j).addClass("firstVague");
        }

        for(let j=16; j>15; j--){
            $("#egaliseur"+currIndex+">#pic3>.rect"+j).addClass("firstVague");
        }

        for(let j=16; j>9; j--){
            $("#egaliseur"+currIndex+">#pic4>.rect"+j).addClass("firstVague");
        }

        for(let j=16; j>11; j--){
            $("#egaliseur"+currIndex+">#pic5>.rect"+j).addClass("firstVague");
        }

        for(let j=16; j>12; j--){
            $("#egaliseur"+currIndex+">#pic6>.rect"+j).addClass("firstVague");
        }

        for(let j=16; j>16; j--){
            $("#egaliseur"+currIndex+">#pic7>.rect"+j).addClass("firstVague");
        }

        for(let j=16; j>14; j--){
            $("#egaliseur"+currIndex+">#pic8>.rect"+j).addClass("firstVague");
        }

        for(let j=16; j>10; j--){
            $("#egaliseur"+currIndex+">#pic9>.rect"+j).addClass("firstVague");
        }

        for(let j=16; j>16; j--){
            $("#egaliseur"+currIndex+">#pic10>.rect"+j).addClass("firstVague");
        }

        for(let j=16; j>12; j--){
            $("#egaliseur"+currIndex+">#pic11>.rect"+j).addClass("firstVague");
        }

        for(let j=16; j>13; j--){
            $("#egaliseur"+currIndex+">#pic12>.rect"+j).addClass("firstVague");
        }
    }

    function secondVague(){
        for(let i=1; i <17; i++){
            $("#egaliseur"+currIndex+">g>.rect"+i).removeClass("firstVague");
        }

        for(let j=16; j>16; j--){
            $("#egaliseur"+currIndex+">#pic1>.rect"+j).addClass("secondVague");
        }

        for(let j=16; j>10; j--){
            $("#egaliseur"+currIndex+">#pic2>.rect"+j).addClass("secondVague");
        }

        for(let j=16; j>8; j--){
            $("#egaliseur"+currIndex+">#pic3>.rect"+j).addClass("secondVague");
        }

        for(let j=16; j>4; j--){
            $("#egaliseur"+currIndex+">#pic4>.rect"+j).addClass("secondVague");
        }

        for(let j=16; j>9; j--){
            $("#egaliseur"+currIndex+">#pic5>.rect"+j).addClass("secondVague");
        }

        for(let j=16; j>16; j--){
            $("#egaliseur"+currIndex+">#pic6>.rect"+j).addClass("secondVague");
        }

        for(let j=16; j>12; j--){
            $("#egaliseur"+currIndex+">#pic7>.rect"+j).addClass("secondVague");
        }

        for(let j=16; j>11; j--){
            $("#egaliseur"+currIndex+">#pic8>.rect"+j).addClass("secondVague");
        }

        for(let j=16; j>16; j--){
            $("#egaliseur"+currIndex+">#pic9>.rect"+j).addClass("secondVague");
        }

        for(let j=16; j>8; j--){
            $("#egaliseur"+currIndex+">#pic10>.rect"+j).addClass("secondVague");
        }

        for(let j=16; j>6; j--){
            $("#egaliseur"+currIndex+">#pic11>.rect"+j).addClass("secondVague");
        }

        for(let j=16; j>16; j--){
            $("#egaliseur"+currIndex+">#pic12>.rect"+j).addClass("secondVague");
        }
    }

    firstVague();
    setTimeout(secondVague(), 50000);

}



function pauseEgaliseur(){
    for(let i=1; i<13; i++){
        for(let j=1; j<17;j++){
            $("#egaliseur"+currIndex+">#pic"+i+">.rect"+j).removeClass("firstVague secondVague");
        }
    }
    $("#egaliseur"+currIndex+">#pic10>.rect16").addClass("rectDebutCache");

    for(let i=16; i>9;i--){
        $("#egaliseur"+currIndex+">#pic1>.rect"+i).addClass("rectDebutCache");
    }

    for(let i=16; i>12; i--){
        $("#egaliseur"+currIndex+">#pic2>.rect"+i).addClass("rectDebutCache");
    }

    for(let i=16; i>10; i--){
        $("#egaliseur"+currIndex+">#pic3>.rect"+i).addClass("rectDebutCache");
    }

    for(let i=16; i>15; i--){
        $("#egaliseur"+currIndex+">#pic5>.rect"+i).addClass("rectDebutCache");
    }

    for(let i=16; i>8; i--){
        $("#egaliseur"+currIndex+">#pic6>.rect"+i).addClass("rectDebutCache");
    }

    for(let i=16; i>13; i--){
        $("#egaliseur"+currIndex+">#pic7>.rect"+i).addClass("rectDebutCache");
    }

    for(let i=16; i>9; i--){
        $("#egaliseur"+currIndex+">#pic8>.rect"+i).addClass("rectDebutCache");
    }

    for(let i=16; i>11; i--){
        $("#egaliseur"+currIndex+">#pic9>.rect"+i).addClass("rectDebutCache");
    }

    for(let i=16; i>5; i--){
        $("#egaliseur"+currIndex+">#pic12>.rect"+i).addClass("rectDebutCache");
    }


}

function playUpload(){
    for(let i=0; i <20; i++){
        if(i === currIndex){
            $("#playUpload"+currIndex).removeClass("affichElement").addClass("affichPasElement");
            $("#pauseUpload"+currIndex).removeClass("affichePasElement").add("affichElement");
        } else {
            $("#playUpload"+i).removeClass("affichPasElement").addClass("affichElement");
            $("#pauseUpload"+i).removeClass("afficheElement").add("affichPasElement");
        }
    }
}

function pauseUpload(){


    for(let i=0; i <20; i++){
        $("#playUpload"+i).removeClass("affichPasElement").addClass("affichElement");
        $("#pauseUpload"+i).removeClass("afficheElement").add("affichPasElement");
    }
}

var albums = ['Dawn'];
var trackNames = ['Skylike - Dawn'];
var trackUrl = ['https://raw.githubusercontent.com/himalayasingh/music-player-1/master/music/2.mp3'];

var playerTrack,
    bgArtwork, bgArtworkUrl,
    albumName, trackName,
    albumArt, sArea, seekBar,
    trackTime, insTime, sHover,
    playPauseButton,  i,
    tProgress, tTime , seekT, seekLoc, seekBarPos, cM, ctMinutes, ctSeconds, curMinutes, curSeconds, durMinutes, durSeconds, playProgress, bTime, nTime = 0, buffInterval = null, tFlag = false,
    albumArtworks = ['_1'],
    playPreviousTrackButton,
    playNextTrackButton, currIndex = -1;



$(function() {
    playerTrack = $("#player-track"),
        bgArtwork = $('#bg-artwork'), bgArtworkUrl,
        albumName = $('#album-name'), trackName = $('#track-name'),
        albumArt = $('#album-art'), sArea = $('#s-area'), seekBar = $('#seek-bar'),
        trackTime = $('#track-time'), insTime = $('#ins-time'), sHover = $('#s-hover'),
        playPauseButton = $("#play-pause-button"), i = playPauseButton.find('i'),
        tProgress = $('#current-time'), tTime = $('#track-length'), seekT, seekLoc, seekBarPos, cM, ctMinutes, ctSeconds, curMinutes, curSeconds, durMinutes, durSeconds, playProgress, bTime, nTime = 0, buffInterval = null, tFlag = false,
        albumArtworks = ['_1'],
        playPreviousTrackButton = $('#play-previous'),
        playNextTrackButton = $('#play-next'), currIndex = -1;
});
function selectTrack(flag)
{
    console.log(trackUrl, currIndex);

    if( flag == 0 || flag == 1 )
        ++currIndex;
    else
        --currIndex;
    if( (currIndex > -1) && (currIndex < trackUrl.length) )
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
            playEgaliseur();
            playUpload();


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
            playEgaliseur();
            playUpload();
            checkBuffering();
            i.attr('class','fas fa-pause');
            audio.play();
        }
        else
        {
            playerTrack.removeClass('active');
            albumArt.removeClass('active');
            pauseEgaliseur();
            pauseUpload();
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
        $("#egaliseur"+currIndex+">g>rect").addClass("rectDebutCache");
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

    playPreviousTrackButton.on('click',function(){ pauseEgaliseur(); pauseUpload(); selectTrack(-1);} );
    playNextTrackButton.on('click',function(){ pauseEgaliseur(); pauseUpload(); selectTrack(1);});
}

$(document).ready(function() {
    initPlayer();

    $("a.chanson").click(function(e){
        e.preventDefault();

        currIndex = $(this).attr("data-nb") - 1;
        for(let i=0; i <15; i++){
            if(i!= currIndex){
                currIndex = i;
                pauseEgaliseur();
                pauseUpload();
            }
        }
        currIndex = $(this).attr("data-nb") - 1;
        selectTrack(1);


    })
});
