<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreUserRequest;

class AuthController extends Controller
{
    // Afficher le formulaire d'inscription
    public function create()
    {
        return view('auth.inscription');
    }

    // Enregistrer un nouvel utilisateur
    public function store(StoreUserRequest $request)
    {
        $utilisateur = User::create($request->validated());
        Auth::login($utilisateur);
        return redirect()->route('accueil')->with('succes', 'Bienvenue sur MediaHub !');
    }

    // Afficher le formulaire de connexion
    public function creerConnexion()
    {
        return view('auth.connexion');
    }

    // Connecter l'utilisateur
    public function connecter(Request $request)
    {
        $identifiants = $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        if (! Auth::attempt($identifiants)) {
            return back()->withErrors(['email' => 'Identifiants incorrects.']);
        }

        $request->session()->regenerate();
        return redirect()->intended(route('accueil'));
    }

    // Déconnecter l'utilisateur
    public function deconnecter(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('accueil');
    }
}