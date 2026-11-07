@extends('layouts.app')

@section('titre', 'Toutes les publications - MediaHub')
@section('meta', 'Découvrez toutes les publications de MediaHub')

@section('contenu')
    <h1>Toutes nos publications</h1>

    <div class="grille-publications"> <!-- Garde tes classes CSS de la semaine 3 ici -->
        @foreach($publications as $publication)
            <article class="carte-publication"> <!-- Garde tes classes CSS -->
                
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
            </article>
        @endforeach
    </div>

    <div class="pagination-container">
{{ $publications->links('pagination::simple-tailwind') }}
</div>
@endsection