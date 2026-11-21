@extends('layouts.app')

@section('titre', 'Accueil - MediaHub')

@section('contenu')
    <h1>Bienvenue sur MediaHub</h1>
    <p>La plateforme de gestion et de diffusion de contenus multimédias.</p>

    <div style="margin: 20px 0;">
        <a href="{{ route('categories.index') }}" style="background: #2c3e50; color: white; padding: 10px 15px; text-decoration: none; border-radius: 4px;">Gérer les catégories</a>
    </div>

    <h2>Nos dernières publications</h2>
    
    <div class="grille-publications">
        @foreach($publications as $publication)
            <div class="carte-publication">
                <h3>
                    <a href="{{ route('publications.show', $publication->id) }}">
                        {{ $publication->titre }}
                    </a>
                </h3>
                <p>{{ $publication->categorie->nom }} - {{ $publication->auteur->name }}</p>
            </div>
        @endforeach
    </div>
@endsection