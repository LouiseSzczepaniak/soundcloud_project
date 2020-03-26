@extends('layout.generale')
@section('contenu')
    <div class="utilisateur">
        <div class="page_user">
            <div class="infos_user">
                <h1 class="pseudo"> {{$utilisateur->name}} </h1>
        @auth
                @if(Auth::id() != $utilisateur->id)
                    @if(Auth::user()->jeLesSuit->contains($utilisateur->id))
                        <a href="/suivre/{{$utilisateur->id}}"> je le suis </a>
                        @else
                        <a href="/suivre/{{$utilisateur->id}}"> je ne le suis pas</a>
                    @endif
                @endif
        @endauth

                <div>
                    <input type="button" class="suivre" value="Suivre"/>
                </div>
                <div>
                    <!-- parenthèses permettent de ne pas tout charger -->
                    <strong> {{$utilisateur->jeLesSuit()->count()}}</strong> abonnements
                </div>
                <div>
                    <strong> {{$utilisateur->ilsMeSuivent()->count()}}</strong> abonnés
                </div>
                <div>
                    <strong> {{$utilisateur->chansons()->count()}} chansons uploadées</strong>
                </div>
            </div>

            <div class="playlists">
                <h2> Playlists</h2>
                @foreach($utilisateur->playlists as $p)
                    <div class="uneplaylist">
                        <h3> {{$p->name}} </h3>
                        <div class="musics_playlist">
                        @foreach($p->chansons as $c)
                                <div>
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
                                        <a href="/like/{{$c->id}}"><div class="like"></div></a>
                                    @endauth
                                </div>
                        @endforeach
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
