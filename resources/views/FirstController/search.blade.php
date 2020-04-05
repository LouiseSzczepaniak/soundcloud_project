@extends('layout.generale')
@section('contenu')
    <div class="resultat_search">
        <div class="resultat_psn">
            <h3> Les utilisateurs </h3>
            @foreach($users as $u)
                <div>
                    <a href="/utilisateur/{{$u->id}}" class="name_search">{{$u->name}}</a>
                    <div class="infos_psn_search">
                        <p> {{$u->chansons()->count()}} chansons uploadées </p>
                        <p> Il suit {{$u->jeLesSuit()->count()}} personnes </p>
                        <p> Il est suivi par {{$u->ilsMeSuivent()->count()}} personnes </p>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="resultat_chansons">
            <h3> Les chansons </h3>
            <div class="ensemble_musics">
            @foreach($chanson as $c)
                    @include("FirstController._chansons")
            @endforeach
            </div>
        </div>
    </div>


@endsection
