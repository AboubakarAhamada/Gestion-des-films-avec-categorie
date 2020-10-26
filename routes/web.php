<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FilmController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


// Pour accéder à toutes les routes : get,post,put, etc
Route::resource('films',FilmController::class);

// Route pour chercher les films par catégorie
Route::get('category/{slug}/films', [FilmController::class, 'index'])
        ->name('films.category');