@extends('layouts.app')

@section('titre', $publication->titre . ' - MediaHub')
@section('meta', Str::limit($publication->contenu, 160))

@section('contenu')
    <article class="publication-detail">
        <h1>{{ $publication->titre }}</h1>
        
        <p class="meta-info">
            <strong>Catégorie :</strong> {{ $publication->categorie->nom }} | 
            <strong>Auteur :</strong> {{ $publication->auteur->name }} | 
            <strong>Date :</strong> {{ $publication->created_at->format('d/m/Y') }}
        </p>

        <div class="contenu-texte">
            {!! nl2br(e($publication->contenu)) !!}
        </div>

        <hr>

        <section class="commentaires">
            <h3>Commentaires</h3>
            
            @if($publication->commentaires->isEmpty())
                <p>Aucun commentaire pour le moment.</p>
            @else
                @foreach($publication->commentaires as $commentaire)
                    <div class="commentaire">
                        <strong>{{ $commentaire->auteur->name }}</strong> dit :
                        <p>{{ $commentaire->contenu }}</p>
                    </div>
                @endforeach
            @endif
        </section>

        <a href="{{ route('publications.index') }}" class="btn-retour">← Retour à la liste</a>
    </article>
@endsection