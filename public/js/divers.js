$(document).ready(function(){
    $("a.chanson").click(function(e){
        e.preventDefault();
        let url = $(this).attr('data-file');
        console.log(url);
        let audio = $('#audio');
        audio[0].src = url;
        audio[0].play();
    })
})

$(document).ready(function(){
    $('#searchform').submit(function(e){
        e.preventDefault();
        window.location.href="/search/"+e.target.elements[0].value;
    })
})



$("#affichPlaylists1").click(function(){
    let etat = document.getElementById("listePlaylists1").style.display;
    console.log(etat);
    if(etat === "block"){
        document.getElementById("listePlaylists1").style.display = "none";
    } else {
        document.getElementById("listePlaylists1").style.display = "block";
    }
})

$(".affichPlaylists").click(function(){
    let nb = $(this).parent('div').attr('id');
    let etat = document.getElementById("listePlaylists"+nb).style.display;
    if(etat === "block"){
        document.getElementById("listePlaylists"+nb).style.display = "none";
    } else {
        document.getElementById("listePlaylists"+nb).style.display = "block";
    }
})

