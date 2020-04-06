@extends('layout.generale')
@section('contenu')
    <div class="utilisateur">
        <div class="page_user">
            <div class="infos_user">
                <h1 class="pseudo"> {{$utilisateur->name}} </h1>
        @auth
                @if(Auth::id() != $utilisateur->id)
                    @if(Auth::user()->jeLesSuit->contains($utilisateur->id))
                        <a href="/suivre/{{$utilisateur->id}}" class="suivre"> Se désabonner </a>
                        @else
                        <a href="/suivre/{{$utilisateur->id}}" class="suivre"> S'abonner </a>
                    @endif
                @endif
        @endauth

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
                <div class="titre_section_playlist">
                    <h2> Playlists</h2>
                    <p class="bouton_nouvelle_playlist"> Créer une playlist </p>
                    <div class="nouvelle_playlist" id="nouvelle_playlist">
                        <form action="/playlist/create" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="text" name="name" required placeholder="Le nom de la playlist" value="{{old('name')}}"/> <br/>
                            <input type="submit" value="Créer" />
                        </form>
                    </div>
                </div>
                @foreach($utilisateur->playlists as $p)
                    <div class="uneplaylist">
                        <div class="titre-playlist"><div>{{$p->name}} </div>
                        <div><a href="/playlist/delete/{{$p->id}}" > <div class="croix"></div></a></div></div>
                        <div class="musics_playlist">
                        @foreach($p->chansons as $c)
                                <a href="/playlist/deletechanson/{{$c->id}}/{{$p->id}}"> Supprimer la chanson de la playlsit</a>
                                @include("FirstController._chansons")
                        @endforeach
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
