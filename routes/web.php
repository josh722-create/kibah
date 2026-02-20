<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SearchController;



Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/buscar', [SearchController::class, 'buscar'])->name('buscar');
Route::get('/propiedad/{id}', [SearchController::class, 'showProperty'])->name('propiedad.show');
Route::get('/propiedades', [SearchController::class, 'allProperties'])->name('propiedades.all');
// Route::get('/propiedades', function () {
//     return view('propiedades');
// });


// Route::get('/propiedad', function () {
//     return view('propiedad');
// });
