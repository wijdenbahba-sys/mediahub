@extends('layouts.app')

@section('titre', 'Toutes les publications - MediaHub')
@section('meta', 'Découvrez toutes les publications de MediaHub')

@section('contenu')
<div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
    <h1>Toutes nos publications</h1>
    
    @auth
        <a href="{{ route('publications.create') }}" style="background: #2c3e50; color: white; padding: 10px 15px; text-decoration: none; border-radius: 4px;">+ Nouvelle publication</a>
    @endauth
</div>

    <div class="grille-publications">
        @foreach($publications as $publication)
            <article class="carte-publication">
                
                <h2>
                    <a href="{{ route('publications.show', $publication->id) }}">
                        {{ $publication->titre }}
                    </a>
                </h2>

                <p class="meta-info">
                    <strong>Catégorie :</strong> {{ $publication->categorie->nom }} <br>
                    <strong>Auteur :</strong> {{ $publication->auteur->name }}
                </p>

                <p>
                    {{ Str::limit($publication->contenu, 150) }}
                </p>
                
                <a href="{{ route('publications.show', $publication->id) }}" class="btn-lire">Lire la suite</a>
                
                <div style="margin-top: 10px;">
                    {{-- On affiche le bouton Modifier seulement si autorisé --}}
                    @can('update', $publication)
                        <a href="{{ route('publications.edit', $publication) }}" style="color: blue; margin-right: 10px;">Modifier</a>
                    @endcan
                    
                    {{-- On affiche le bouton Supprimer seulement si autorisé --}}
                    @can('delete', $publication)
                        <form action="{{ route('publications.destroy', $publication) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Sûr de vouloir supprimer ?')" style="color: red; background: none; border: none; cursor: pointer; text-decoration: underline;">Supprimer</button>
                        </form>
                    @endcan
                </div>
            </article>

        @endforeach
    </div>

    <div class="pagination-container">
        {{ $publications->links('pagination::simple-tailwind') }}
    </div>
@endsection