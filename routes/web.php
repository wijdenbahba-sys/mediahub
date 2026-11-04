<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ContenuController;
use App\Http\Controllers\AdminController;

// Route d'accueil
Route::get('/', [PageController::class, 'accueil'])->name('accueil');

// Route à propos
Route::get('/a-propos', [PageController::class, 'aPropos'])->name('a-propos');

// Route resource pour les contenus (hedhi hiya elli na9sa!)
Route::resource('contenus', ContenuController::class);

// Routes admin
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/tableau-de-bord', [AdminController::class, 'index'])->name('dashboard');
});