<?php

namespace App\Http\Controllers;

use App\Models\Publication;
use Illuminate\Http\Request;

class PublicationController extends Controller
{
    public function index()
    {
        // On charge la catégorie et l'auteur en même temps (Eager Loading)
        $publications = Publication::with(['categorie', 'auteur'])
            ->latest()
            ->paginate(9);

        return view('contenus.index', ['publications' => $publications]);
    }
public function show(Publication $publication)
{
    $publication->load(['categorie', 'auteur', 'commentaires.auteur']);

    return view('contenus.show', ['publication' => $publication]);
}
}