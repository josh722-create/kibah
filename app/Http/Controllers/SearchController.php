<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Propiedad;
use Illuminate\Support\Facades\Log;


class SearchController extends Controller
{
    public function buscar(Request $request)
    {
        Log::info('Búsqueda recibida:', $request->all());

        $query = Propiedad::query();

        // Filtro por colonia
        if ($request->filled('colonia')) {
            $query->where('Colonia', $request->colonia);
        }

        // Filtro por recámaras
        if ($request->filled('recamaras')) {
            $recamaras = $request->recamaras;
            if ($recamaras === '5') {
                $query->where('Número de Recámaras', '>=', 5);
            } else {
                $query->where('Número de Recámaras', $recamaras);
            }
        }

        // Filtro por baños
        if ($request->filled('banos')) {
            $banos = $request->banos;
            if ($banos === '5') {
                $query->where('Número de Baños', '>=', 5);
            } else {
                $query->where('Número de Baños', $banos);
            }
        }

        // Filtro por tipo de propiedad (desde welcome, con nombre 'tipo_propiedad')
        if ($request->filled('tipo_propiedad')) {
            $query->where('Entrega Inmediata/Preventa', $request->tipo_propiedad);
        }

        // Filtro por estado (desde header, con nombre 'estado')
        if ($request->filled('estado')) {
            $query->where('Entrega Inmediata/Preventa', $request->estado);
        }

        $propiedades = $query->get();

        // Obtener colonias únicas (para el select)
        $colonias = Propiedad::select('Colonia')
            ->whereNotNull('Colonia')
            ->where('Colonia', '!=', '')
            ->distinct()
            ->orderBy('Colonia')
            ->pluck('Colonia')
            ->filter(function ($value) {
                return !empty(trim($value));
            });

        Log::info('Resultados obtenidos:', ['cantidad' => $propiedades->count()]);

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
            ->limit(4)
            ->get();

        $propiedadIndividual = Propiedad::whereIn('Entrega Inmediata/Preventa', ['Entrega Inmediata', 'Preventa'])
            ->inRandomOrder()
            ->limit(1)
            ->get();

        return view('propiedad', compact('propiedad', 'colonias', 'propiedadesDestacadas', 'propiedadIndividual'));
    }

    public function allProperties()
    {
        $propiedades = Propiedad::all();
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
        return view('propiedadesgenerales', compact('propiedades', 'colonias'));
    }
}
