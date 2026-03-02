<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AnnonceController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('dashboard', [AnnonceController::class, 'dashboard'])
   ->name('annonces.dashboard');

Route::resource('annonces', AnnonceController::class);