@extends('layout.generale')
@section('contenu')

    <div class="banniere_accueil">
        <form id="searchform">
            <input type="search" placeholder="Recherche une musique, un utilisateur..." class="formulaire_recherche"/>
        </form>
        <p class="banniere_ou"> Ou</p>
        <a href="/chanson/nouvelle" class="nouvelle_chanson"> Uploadez la vôtre </a>
    </div>
    <h3 class="titre_section"> Les musiques récemment uplodées </h3>
    <div class="soulignement"></div>
    @include("FirstController._chansons")
@endsection
