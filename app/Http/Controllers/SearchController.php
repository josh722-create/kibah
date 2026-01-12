<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Propiedad;
use Illuminate\Support\Facades\Log;


class SearchController extends Controller
{
    public function buscar(Request $request)
    {
        // Log para debugging
        Log::info('Búsqueda recibida:', $request->all());

        $query = Propiedad::query();

        // Filtro por colonia
        if ($request->filled('colonia')) {
            $query->where('Colonia', $request->colonia);
        }

        // Filtro por recámaras
        if ($request->filled('Número de Recámaras')) {
            $recamaras = $request->recamaras;
            if ($recamaras === '5') {
                $query->where('Número de recámaras', '>=', 5);
            } else {
                $query->where('Número de recámaras', $recamaras);
            }
        }

        // Filtro por baños
        if ($request->filled('Número de Baños')) {
            $banos = $request->banos;
            if ($banos === '5') {
                $query->where('Número de baños', '>=', 5);
            } else {
                $query->where('Número de baños', $banos);
            }
        }

        $propiedades = $query->get();

        $colonias = Propiedad::select('Colonia')
            ->whereNotNull('Colonia')
            ->where('Colonia', '!=', '')
            ->distinct()
            ->orderBy('Colonia')
            ->pluck('Colonia')
            ->filter(function ($value) {
                return !empty(trim($value));
            });

        Log::info($propiedades);

        return view('propiedades', compact('propiedades', 'colonias'));
    }

    public function showProperty($id)
    {
        // Buscar la propiedad por ID
        $propiedad = Propiedad::find($id);

        // colonias
        $colonias = Propiedad::select('Colonia')
            ->whereNotNull('Colonia')
            ->where('Colonia', '!=', '')
            ->distinct()
            ->orderBy('Colonia')
            ->pluck('Colonia')
            ->filter(function ($value) {
                return !empty(trim($value));
            });

        // Si no existe, redirigir a 404
        if (!$propiedad) {
            abort(404);
        }

        // Log para debugging
        Log::info('Vista individual de propiedad:', [
            'id' => $id,
            'nombre_real' => $propiedad->{'Nombre de la Propiedad'}
        ]);

        // Propiedades destacadas
        $propiedadesDestacadas = Propiedad::whereIn('Entrega Inmediata/Preventa', ['Entrega Inmediata', 'Preventa'])
            ->inRandomOrder()
            ->limit(5)
            ->get();

        return view('propiedad', compact('propiedad', 'colonias', 'propiedadesDestacadas'));
    }
}
