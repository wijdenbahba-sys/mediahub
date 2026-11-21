@extends('layouts.app')
@section('titre', 'Modifier la publication')

@section('contenu')
    <div style="max-width: 600px; margin: auto;">
        <h1>Modifier : {{ $publication->titre }}</h1>
        
        <form action="{{ route('publications.update', $publication) }}" method="POST" style="margin-top: 20px;">
            @csrf
            @method('PUT')
            
            <div style="margin-bottom: 15px;">
                <label for="titre">Titre :</label><br>
                <input type="text" name="titre" id="titre" value="{{ old('titre', $publication->titre) }}" required style="padding: 8px; width: 100%;">
            </div>

            <div style="margin-bottom: 15px;">
                <label for="categorie_id">Catégorie :</label><br>
                <select name="categorie_id" id="categorie_id" required style="padding: 8px; width: 100%;">
                    @foreach($categories as $categorie)
                        <option value="{{ $categorie->id }}" {{ $publication->categorie_id == $categorie->id ? 'selected' : '' }}>
                            {{ $categorie->nom }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div style="margin-bottom: 15px;">
                <label for="contenu">Contenu :</label><br>
                <textarea name="contenu" id="contenu" rows="6" required style="padding: 8px; width: 100%;">{{ old('contenu', $publication->contenu) }}</textarea>
            </div>

            <button type="submit" style="background: #2c3e50; color: white; padding: 10px 20px; border: none; cursor: pointer; border-radius: 4px;">Mettre à jour</button>
            <a href="{{ route('publications.show', $publication) }}" style="margin-left: 10px;">Annuler</a>
        </form>
    </div>
@endsection