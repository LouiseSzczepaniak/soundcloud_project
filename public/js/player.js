
$(document).ready(function() {
   var nb = 0;
    console.log(albums);
    trackUrl = [];
    albums = [];
    $("a.chanson").each(function() {
        $(this).attr('data-nb',nb);
        trackUrl.push($(this).attr('data-file'));
        albums.push($(this).attr('data-name'));
        nb++;
    });
    selectTrack(0);
    //console.log(albums, trackUrl);
});
