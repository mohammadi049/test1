<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FiliereController;
use App\Http\Controllers\GroupeController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\StagiaireController;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('welcome');
});
// Route::get('/home', function () {
//     return view('home');
// })->name('home');

Auth::routes();

Route::middleware('auth')->group(function () {

    Route::get('/filiere', [FiliereController::class, 'index']);
    Route::post('/filiere', [FiliereController::class, 'store']);
    Route::get('/filiere/create', [FiliereController::class, 'create']);

    Route::get('/groupe', [GroupeController::class, 'index']);
    Route::post('/groupe/get', [GroupeController::class, 'getGroupe']);
    Route::post('/groupe', [GroupeController::class, 'store']);
    Route::get('/groupe/create', [GroupeController::class, 'create']);

    Route::get('/stagiaire', [StagiaireController::class, 'index']);
    Route::get('/stagiaire/create', [StagiaireController::class, 'create']);
    Route::post('/stagiaire/get', [StagiaireController::class, 'show']);
    Route::get('/stagiaire/{stagiaire}', [StagiaireController::class, 'showStagiaire'])->name('stagiaires.show');
    Route::post('/stagiaire', [StagiaireController::class, 'store']);
    Route::get('/stagiaire/{stagiaire}/edit', [StagiaireController::class, 'edit'])->name('stagiaire.edit');
    Route::put('/stagiaire/{stagiaire}', [StagiaireController::class, 'update'])->name('stagiaire.update');
    Route::delete('/stagiaire/{stagiaire}', [StagiaireController::class, 'delete'])->name('stagiaire.delete');
});
