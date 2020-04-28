@extends('layout.generale')
@section('contenu')

    <div class="banniere_accueil">
        <form id="searchform">
            <input type="search" placeholder="Recherche une musique, un utilisateur..." class="formulaire_recherche"/>
        </form>
        <p class="banniere_ou"> Ou</p>
        <a href="/chanson/nouvelle" class="nouvelle_chanson"> Uploadez la vôtre </a>
    </div>
    <div class="scroll-part content is-invert">
        <h3 class="titre_section content__to-right"> Les musiques récemment uplodées </h3>
        <div class="soulignement content__to-right"></div>
        <div class="ensemble_musics content__to-scale">
            @foreach($chansons as $c)
                @include("FirstController._chansons")
            @endforeach
        </div>
    </div>
    <script src="/js/player.js"></script>

@endsection

