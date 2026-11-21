@extends('layouts.app')
@section('titre', 'Nouvelle catégorie')

@section('contenu')
    <h1>Créer une catégorie</h1>
    
    <form action="{{ route('categories.store') }}" method="POST" style="margin-top: 20px;">
        @csrf
        <div style="margin-bottom: 15px;">
            <label for="nom">Nom de la catégorie :</label><br>
            <input type="text" name="nom" id="nom" value="{{ old('nom') }}" required style="padding: 8px; width: 100%; max-width: 300px;">
        </div>
        <button type="submit" style="background: #2c3e50; color: white; padding: 10px 20px; border: none; cursor: pointer;">Enregistrer</button>
        <a href="{{ route('categories.index') }}">Annuler</a>
    </form>
@endsection