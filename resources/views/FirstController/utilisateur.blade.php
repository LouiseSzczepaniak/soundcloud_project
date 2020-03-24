
@extends('layout.generale')
@section('contenu')
<div class="utilisateur">
   <div class="page_user"> <h1 class="pseudo"> {{$utilisateur->name}}</h1>

    @auth
            @if(Auth::id() != $utilisateur->id)
                @if(Auth::user()->jeLesSuit->contains($utilisateur->id))
                    <a href="/suivre/{{$utilisateur->id}}"> je le suis </a>
                    @else
                    <a href="/suivre/{{$utilisateur->id}}"> je ne le suis pas</a>
                @endif
            @endif
    @endauth
            <div><input type="button" class="suivre" value="Suivre"/></div>
            <div> <strong>{{$utilisateur->jeLesSuit()->count()}}</strong> abonnements</div>
            <div> <strong>{{$utilisateur->ilsMeSuivent()->count()}}</strong> abonnés</div>
         <div><strong>{{$utilisateur->chansons()->count()}}</strong> chansons uploadées</div>
        <!-- parenthèses permettent de ne pas tout charger -->
         
        
    
    
</div>

<div class="user_music_playlist">
    @include('FirstController._chansons', ["chansons" => $utilisateur->chansons])
</div>
</div>
@endsection

