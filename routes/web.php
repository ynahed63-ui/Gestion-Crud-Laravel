<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AnnonceController;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('annonces', AnnonceController::class);
Route::get('annonces/dashboard', [AnnonceController::class, 'dashboard'])
   ->name('annonces.dashboard');