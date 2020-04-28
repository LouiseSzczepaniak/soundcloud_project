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
                   <div class="title1" onclick="onglet(1)">Playlists</div>
                    <div class="title2" onclick="onglet(2)">Chansons uploadées</div>
                </div>

                <div class="playlists" id="playlists">
                    <div class="flex">
                        <div class="bouton_nouvelle_playlist"> Créer une playlist </div>
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
                            <div class="titre-playlist">
                                <div>{{$p->name}} </div>
                                @if(Auth::id() == $utilisateur->id)
                                    <div>
                                        <a href="/playlist/delete/{{$p->id}}">
                                            <div class="croix"></div>
                                        </a>
                                    </div>
                                @endif
                            </div>
                            <div class="musics_playlist">
                                @foreach($p->chansons as $c)
                                    @if(Auth::id() == $utilisateur->id)
                                        <a href="/playlist/deletechanson/{{$c->id}}/{{$p->id}}"> <div class="croix top"></div></a>
                                    @endif
                                    @include("FirstController._chansons")
                                @endforeach
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="chansons_uploadees" id="chansons_uploadees">
                <div class="ensemble_musics">
                    @foreach($utilisateur->chansons as $c)
                        
                        <div>
                            @if(Auth::id() == $utilisateur->id)
                               <a href="/chanson/delete/{{$c->id}}"> <div class="croix"></div> </a>
                            @endif
                            @include("FirstController._chansonsuploadees")
                            </div>
                        

                    @endforeach
                    </div>
                </div>

            </div>
        </div>
    </div>
    <script src="/js/player.js"></script>
@endsection
