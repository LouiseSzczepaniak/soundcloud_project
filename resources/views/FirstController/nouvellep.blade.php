@extends('layout.generale')
@section('contenu')
    <h2> Nouvelle playlist </h2>
    @if($errors->any())
        <ul>
            @foreach($errors->all() as $error)
                <li> {{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form action="/playlist/create" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="text" name="name" required placeholder="Le nom de la playlist" value="{{old('name')}}"/> <br/>
        <input type="submit" value="GO" />
    </form>

@endsection
