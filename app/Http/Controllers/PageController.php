<?php

namespace App\Http\Controllers;

use App\Models\Publication; // <-- Il faut absolument cette ligne en haut !
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function accueil()
    {
        // On récupère les 3 dernières publications
        $publications = Publication::with(['categorie', 'auteur'])->latest()->take(3)->get();
        
        // On envoie la variable $publications à la vue 'accueil'
        return view('accueil', ['publications' => $publications]); 
    }

    public function aPropos()
    {
        return view('a-propos');
    }
}