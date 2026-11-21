<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\CategorieController;
use App\Http\Controllers\PublicationController;
use App\Http\Controllers\AuthController;
Route::get('/', [PageController::class, 'accueil'])->name('accueil');
Route::get('/a-propos', [PageController::class, 'aPropos'])->name('a-propos');

Route::resource('categories', CategorieController::class);
// Route publique (tout le monde peut voir la liste et le détail)
Route::resource('publications', PublicationController::class)->except(['create', 'store', 'edit', 'update', 'destroy']);

// Routes protégées (seulement pour les connectés)
Route::middleware('auth')->group(function () {
    Route::resource('publications', PublicationController::class)->only(['create', 'store', 'edit', 'update', 'destroy']);
});
// Routes pour les invités (non connectés)
Route::middleware('guest')->group(function () {
    Route::get('/inscription', [AuthController::class, 'create'])->name('inscription');
    Route::post('/inscription', [AuthController::class, 'store']);
    Route::get('/connexion', [AuthController::class, 'creerConnexion'])->name('connexion');
    Route::post('/connexion', [AuthController::class, 'connecter']);
});

// Route pour les utilisateurs connectés
Route::middleware('auth')->group(function () {
    Route::post('/deconnexion', [AuthController::class, 'deconnecter'])->name('deconnexion');
});