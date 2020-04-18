@extends('layout.generale')
@section('contenu')
    <h2 class="titre_section"> Nouvelle chanson </h2>
    <div class="soulignement"></div>
    @if($errors->any())
        <ul>
            @foreach($errors->all() as $error)
                <li> {{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form action="/chanson/create" method="POST" enctype="multipart/form-data" class="new_chanson">
        @csrf
        <input type="text" class="new_chanson_text" name="nom" required placeholder="Le nom..." value="{{old('nom')}}"/> <br/>
        <input type="file" class="new_chanson_upload" name="chanson" required /> <br/>
        <input type="text" class="new_chanson_style" name="style" required placeholder="Le style..." value="{{old('style')}}"/> <br/>
        <input type="submit" value="GO" class="new_chanson_submit" />
    </form>

@endsection
