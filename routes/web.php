<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\CategorieController;
use App\Http\Controllers\PublicationController;

Route::get('/', [PageController::class, 'accueil'])->name('accueil');
Route::get('/a-propos', [PageController::class, 'aPropos'])->name('a-propos');

Route::resource('categories', CategorieController::class);
Route::resource('publications', PublicationController::class);