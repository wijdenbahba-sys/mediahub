@extends('layouts.app')

@section('titre', 'Accueil - MediaHub')

@section('contenu')
    <h1>Bienvenue sur MediaHub</h1>
    <p>La plateforme de gestion et de diffusion de contenus multimédias.</p>

    <h2>Nos dernières publications</h2>
    
    <div class="grille-publications"> <!-- Tes classes CSS -->
        @foreach($publications as $publication)
            <div class="carte-publication">
                <h3>
                    <a href="{{ route('publications.show', $publication->id) }}">
                        {{ $publication->titre }}
                    </a>
                </h3>
                <p>
                    {{ $publication->categorie->nom }} - {{ $publication->auteur->name }}
                </p>
            </div>
        @endforeach
    </div>
@endsection