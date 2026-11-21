@extends('layouts.app')
@section('titre', 'Gestion des catégories')

@section('contenu')
    <div style="display: flex; justify-content: space-between; align-items: center;">
        <h1>Liste des catégories</h1>
@can('gerer-categories')
    <a href="{{ route('categories.create') }}" style="...">+ Nouvelle catégorie</a>
@endcan
    </div>

    <table style="width: 100%; border-collapse: collapse; margin-top: 20px;">
        <thead>
            <tr style="background: #f4f4f4; text-align: left;">
                <th style="padding: 10px; border: 1px solid #ddd;">ID</th>
                <th style="padding: 10px; border: 1px solid #ddd;">Nom</th>
                <th style="padding: 10px; border: 1px solid #ddd;">Slug</th>
                <th style="padding: 10px; border: 1px solid #ddd;">Publications liées</th>
                <th style="padding: 10px; border: 1px solid #ddd;">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($categories as $categorie)
                <tr>
                    <td style="padding: 10px; border: 1px solid #ddd;">{{ $categorie->id }}</td>
                    <td style="padding: 10px; border: 1px solid #ddd;">{{ $categorie->nom }}</td>
                    <td style="padding: 10px; border: 1px solid #ddd;">{{ $categorie->slug }}</td>
                    <td style="padding: 10px; border: 1px solid #ddd;">{{ $categorie->publications_count }}</td>
                    <td style="padding: 10px; border: 1px solid #ddd;">
                        <a href="{{ route('categories.edit', $categorie) }}">Modifier</a>
                        
                        <form action="{{ route('categories.destroy', $categorie) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Sûr ?')" style="color: red; background: none; border: none; cursor: pointer;">Supprimer</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection