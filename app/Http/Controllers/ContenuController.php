<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContenuController extends Controller
{
    public function index(Request $request)
    {
        $recherche = $request->query('q');
        
        $contenus = [
            (object) ['titre' => 'Court-métrage documentaire', 'description' => 'Un aperçu de la vie urbaine.'],
            (object) ['titre' => 'Podcast technologie', 'description' => 'Actualités du développement web.'],
            (object) ['titre' => 'Clip musical', 'description' => 'Une production indépendante.'],
        ];

        return view('contenus.index', [
            'contenus' => $contenus,
            'recherche' => $recherche
        ]);
    }

    public function show($id)
    {
        
          //dd($id); 
        
       return "Détail du contenu numéro " . $id;
    }
}