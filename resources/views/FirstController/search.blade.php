@extends('layout.generale')
@section('contenu')
    <div class="search">
        <h2 class="title_resultSearch"> Les résultats pour : {{$element}}</h2>
        <div class="resultat_search">
            <h3 class="title_search"> Les utilisateurs </h3>
            @if($users->isEmpty())
                <p> Aucun utilisateur ne correspond à votre recherche.</p>
            @endif
            <div class="resultat_psn">
                @foreach($users as $u)
                    <div class="unepersonne_search">
                        <a href="/utilisateur/{{$u->id}}" class="name_search">{{$u->name}}</a>
                        <div class="infos_psn_search">
                            <p> {{$u->jeLesSuit()->count()}} abonnements </p>
                            <p> {{$u->ilsMeSuivent()->count()}} abonnés </p>
                            <p> {{$u->chansons()->count()}} chansons uploadées </p>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="resultat_chansons">
                <h3 class="title_search"> Les chansons </h3>
                @if($chanson->isEmpty())
                    <p> Aucune chanson ne correspond à votre recherche.</p>
                @endif
                <div class="ensemble_musics">

                @foreach($chanson as $c)
                        @include("FirstController._chansons")
                @endforeach
                </div>
            </div>
        </div>
    </div>
    <script src="/js/player.js"></script>
@endsection
