<div class="ensemble_musics">
@foreach($chansons as $c)
    <div class="music">
        <div class="img_music">
            <img src="/img/image_musique.png" alt="imagemusique"/>
            <div class="music-hover">
                <div class="contenu-hover">
                    @auth
                        @if(Auth::user()->jeLike->contains($c->id))
                            <a data-pjax class="a_like" href="/like/{{$c->id}}"><div class="like"></div></a>
                        @else
                            <a data-pjax class="a_like" href="/like/{{$c->id}}"><div class="like_hover"></div></a>
                        @endif
                    @endauth
                    <a href="#" data-file="{{$c->url}}" class="chanson lienmusic">
                        <img src="/img/music_play.png" class="img_hover_lien"  alt="play_music"/>
                    </a>
                        @auth
                            <div id="{{$c->id}}" class="ensemble_listPlaylist">
                                <input type="button" class="affichPlaylists" id="affichPlaylists{{$c->id}}"/>
                               <!-- <img src="/img/music_ajouter.png" type="button" class="img_hover_music" id="affichPlaylists{{$c->id}}" />-->
                            </div>
                        @endauth

                </div>
            </div>
            @auth
                <div class="listePlaylists" id="listePlaylists{{$c->id}}">
                    @foreach(Auth::user()->playlists as $p)
                        <a href="/ajouterplaylist/{{$c->id}}/{{$p->id}}"> {{$p->name}}</a><br/>
                    @endforeach
                </div>
            @endauth
        </div>

    <!--   <a href="#" data-file="{{$c->url}}" class="chanson">
            <img src="/img/image_musique.png" alt="imagemusique"/>
        </a>-->
        <p class="titre_musique"> {{$c->nom}}</p>
        <p class="style_musique"> {{$c->style}}</p>
        <p class="psn_upload"> Uploadée par
            <a href="/utilisateur/{{$c->utilisateur->id}}"> {{$c->utilisateur->name}}
            </a>
        </p>

    </div>
@endforeach
</div>
