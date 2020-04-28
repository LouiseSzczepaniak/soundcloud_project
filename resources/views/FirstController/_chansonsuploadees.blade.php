<div style="display: none;" class="nbListePlaylist" id="{{$c->count()}}"/></div>
<div class="music">
    <div class="img_music">
        @auth
            <div class="listePlaylists" id="listePlaylists{{$c->id}}">
                @foreach(Auth::user()->playlists as $p)
                    <a href="/ajouterplaylist/{{$c->id}}/{{$p->id}}"> {{$p->name}}</a>
                @endforeach
            </div>
        @endauth

    </div>

    <a href="#" data-file="{{$c->url}}" data-name="{{$c->nom}}" data-id="{{$c->id}}" class="chanson">
        <div class="play2 affichElement" id="playUpload{{$c->id}}"></div>
        <div class="pause2 affichPasElement" id="pauseUpload{{$c->id}}"></div>
    </a>
    <p class="titre_musique"> {{$c->nom}}</p>
    <p class="style_musique"> {{$c->style}}</p>
    <p class="psn_upload"> Uploadée par
        <a href="/utilisateur/{{$c->utilisateur->id}}"> {{$c->utilisateur->name}}</a>
        le {{ \Carbon\Carbon::parse($c->created_at)->format('d/m/Y') }}
    </p>

</div>
