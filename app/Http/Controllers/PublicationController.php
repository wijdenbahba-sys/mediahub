<?php

namespace App\Http\Controllers;

use App\Models\Publication;
use App\Models\Categorie;
use Illuminate\Http\Request;
use App\Http\Requests\StorePublicationRequest;
use App\Http\Requests\UpdatePublicationRequest;
class PublicationController extends Controller
{
    public function index()
    {
        $publications = Publication::with(['categorie', 'auteur'])->latest()->paginate(9);
        return view('contenus.index', compact('publications'));
    }

    public function create()
    {
        $categories = Categorie::all();
        return view('contenus.create', compact('categories'));
    }

          public function store(StorePublicationRequest $request)
    {
        $publication = Publication::create([
            'titre' => $request->titre,
            'contenu' => $request->contenu,
            'categorie_id' => $request->categorie_id,
            'user_id' => auth()->id(), // <-- L'utilisateur connecté
        ]);
        return redirect()->route('publications.show', $publication)->with('succes', 'Publication créée avec succès.');
    }

    public function update(UpdatePublicationRequest $request, Publication $publication)
    {
        $this->authorize('update', $publication); // <-- Vérification de sécurité
        $publication->update([
            'titre' => $request->titre,
            'contenu' => $request->contenu,
            'categorie_id' => $request->categorie_id,
        ]);
        return redirect()->route('publications.show', $publication)->with('succes', 'Publication mise à jour avec succès.');
    }

    public function show(Publication $publication)
    {
        $publication->load(['categorie', 'auteur', 'commentaires.auteur']);
        return view('contenus.show', compact('publication'));
    }

      public function edit(Publication $publication)
    {
        $this->authorize('update', $publication); // <-- Vérification de sécurité
        $categories = Categorie::all();
        return view('contenus.edit', compact('publication', 'categories'));
    }

    

    public function destroy(Publication $publication)
    {
        $this->authorize('delete', $publication); // <-- Vérification de sécurité
        $publication->delete();
        return redirect()->route('publications.index')->with('succes', 'Publication supprimée avec succès.');
    }
}