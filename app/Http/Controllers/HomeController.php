<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Propiedad;

class HomeController extends Controller
{
    //
    public function index()
    {
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
            ->limit(5)
            ->get();

        // Propiedades en Preventa (máximo 5)
        $preventa = Propiedad::where('Entrega Inmediata/Preventa', 'Preventa')
            ->limit(5)
            ->get();
        return view('welcome', compact('colonias', 'tiposEntrega', 'entregaInmediata', 'preventa'));
    }
}
