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
