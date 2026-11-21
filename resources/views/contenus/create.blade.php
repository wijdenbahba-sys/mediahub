@extends('layouts.app')
@section('titre', 'Nouvelle publication')

@section('contenu')
    <div style="max-width: 600px; margin: auto;">
        <h1>Créer une publication</h1>
        
        <form action="{{ route('publications.store') }}" method="POST" style="margin-top: 20px;">
            @csrf
            
            <div style="margin-bottom: 15px;">
                <label for="titre">Titre :</label><br>
                <input type="text" name="titre" id="titre" value="{{ old('titre') }}" required style="padding: 8px; width: 100%;">
            </div>

            <div style="margin-bottom: 15px;">
                <label for="categorie_id">Catégorie :</label><br>
                <select name="categorie_id" id="categorie_id" required style="padding: 8px; width: 100%;">
                    <option value="">-- Choisir une catégorie --</option>
                    @foreach($categories as $categorie)
                        <option value="{{ $categorie->id }}">{{ $categorie->nom }}</option>
                    @endforeach
                </select>
            </div>

            <div style="margin-bottom: 15px;">
                <label for="contenu">Contenu :</label><br>
                <textarea name="contenu" id="contenu" rows="6" required style="padding: 8px; width: 100%;">{{ old('contenu') }}</textarea>
            </div>

            <button type="submit" style="background: #2c3e50; color: white; padding: 10px 20px; border: none; cursor: pointer; border-radius: 4px;">Publier</button>
            <a href="{{ route('publications.index') }}" style="margin-left: 10px;">Annuler</a>
        </form>
    </div>
@endsection