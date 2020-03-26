<div class="ensemble_musics">
@foreach($chansons as $c)
    <div class="music">
        <a href="#" data-file="{{$c->url}}" class="chanson">
            <img src="/img/image_musique.png" alt="imagemusique"/>
        </a>
        <p class="titre_musique"> {{$c->nom}}</p>
        <p class="style_musique"> {{$c->style}}</p>
        <p class="psn_upload"> Uploadée par
            <a href="/utilisateur/{{$c->utilisateur->id}}"> {{$c->utilisateur->name}}
            </a>
        </p>

        @auth
           <a href="/like/{{$c->id}}">
               <div class="like"></div>
           </a>
        @endauth
    </div>
@endforeach
</div>
