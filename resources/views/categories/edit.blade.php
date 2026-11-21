@extends('layouts.app')
@section('titre', 'Modifier la catégorie')

@section('contenu')
    <h1>Modifier : {{ $category->nom }}</h1>
    
    <form action="{{ route('categories.update', $category) }}" method="POST" style="margin-top: 20px;">
        @csrf
        @method('PUT')
        <div style="margin-bottom: 15px;">
            <label for="nom">Nom de la catégorie :</label><br>
            <input type="text" name="nom" id="nom" value="{{ old('nom', $category->nom) }}" required style="padding: 8px; width: 100%; max-width: 300px;">
        </div>
        <button type="submit" style="background: #2c3e50; color: white; padding: 10px 20px; border: none; cursor: pointer;">Mettre à jour</button>
        <a href="{{ route('categories.index') }}">Annuler</a>
    </form>
@endsection