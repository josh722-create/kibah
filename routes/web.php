<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SearchController;
use App\Models\Propiedad;


Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/cargar-mas', [HomeController::class, 'cargarMas'])->name('home.cargarMas');
Route::get('/buscar', [SearchController::class, 'buscar'])->name('buscar');
Route::get('/propiedad/{id}', [SearchController::class, 'showProperty'])->name('propiedad.show');
Route::get('/propiedades', [SearchController::class, 'allProperties'])->name('propiedades.all');
// routes/web.php
Route::get('nosotros', function () {
    // Obtener colonias únicas, sin vacíos y ordenadas
    $colonias = Propiedad::select('Colonia')
        ->whereNotNull('Colonia')
        ->where('Colonia', '!=', '')
        ->distinct()
        ->orderBy('Colonia')
        ->pluck('Colonia')
        ->filter(function ($value) {
            return !empty(trim($value));
        });

    // Obtener tipos de entrega únicos, sin vacíos
    $tiposEntrega = Propiedad::select('Entrega Inmediata/Preventa')
        ->whereNotNull('Entrega Inmediata/Preventa')
        ->where('Entrega Inmediata/Preventa', '!=', '')
        ->distinct()
        ->orderBy('Entrega Inmediata/Preventa')
        ->pluck('Entrega Inmediata/Preventa')
        ->filter(function ($value) {
            return !empty(trim($value));
        });

    // Propiedades con Entrega Inmediata (máximo 5)
    $entregaInmediata = Propiedad::where('Entrega Inmediata/Preventa', 'Entrega Inmediata')
        ->inRandomOrder()
        ->limit(5)
        ->get();

    // Propiedades en Preventa (máximo 5)
    $preventa = Propiedad::where('Entrega Inmediata/Preventa', 'Preventa')
        ->inRandomOrder()
        ->limit(5)
        ->get();

    $propiedadesDestacadasHome = $entregaInmediata->merge($preventa)->shuffle();

    return view('nosotros', compact('colonias', 'tiposEntrega', 'propiedadesDestacadasHome'));
})->name('nosotros');

Route::view('/privacidad', 'privacidad')->name('privacidad');
// Route::get('/propiedades', function () {
//     return view('propiedades');
// });


// Route::get('/propiedad', function () {
//     return view('propiedad');
// });
