<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Http\Requests\StoreCategorieRequest;
use App\Http\Requests\UpdateCategorieRequest;
class CategorieController extends Controller
{
    public function index()
{
    // On ajoute ->paginate(5) à la place de ->get()
    $categories = Categorie::withCount('publications')->paginate(5);
    return view('categories.index', compact('categories'));
}
    public function create()
    {
        return view('categories.create');
    }

        public function store(StoreCategorieRequest $request)
    {
        Categorie::create([
            'nom' => $request->nom,
            'slug' => \Str::slug($request->nom)
        ]);
        return redirect()->route('categories.index')->with('succes', 'Catégorie créée avec succès.');
    }

    public function update(UpdateCategorieRequest $request, Categorie $category)
    {
        $category->update([
            'nom' => $request->nom,
            'slug' => \Str::slug($request->nom)
        ]);
        return redirect()->route('categories.index')->with('succes', 'Catégorie mise à jour avec succès.');
    }

    public function edit(Categorie $category)
    {
        return view('categories.edit', compact('category'));
    }

    

    public function destroy(Categorie $category)
    {
        if ($category->publications()->count() > 0) {
            return redirect()->route('categories.index')->with('erreur', 'Impossible de supprimer, cette catégorie contient des publications.');
        }

        $category->delete();
        return redirect()->route('categories.index')->with('succes', 'Catégorie supprimée avec succès.');
    }
}