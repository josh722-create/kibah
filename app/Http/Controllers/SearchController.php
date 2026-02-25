<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Propiedad;
use Illuminate\Support\Facades\Log;


class SearchController extends Controller
{
    public function buscar(Request $request)
    {
        Log::info('========== INICIO BÚSQUEDA ==========');
        Log::info('Parámetros recibidos:', $request->all());

        $query = Propiedad::query();

        // Filtro por colonia
        if ($request->filled('colonia')) {
            Log::info('Aplicando filtro de colonia:', ['colonia' => $request->colonia]);
            $query->where('Colonia', $request->colonia);
        }

        // Filtro por recámaras
        if ($request->filled('recamaras')) {
            $recamaras = $request->recamaras;
            Log::info('Aplicando filtro de recámaras:', ['recamaras' => $recamaras]);
            if ($recamaras === '5') {
                $query->where('Número de Recámaras', '>=', 5);
            } else {
                $query->where('Número de Recámaras', $recamaras);
            }
        }

        // Filtro por precio mínimo
        if ($request->filled('precio_min')) {
            Log::info('Aplicando filtro precio mínimo:', ['precio_min' => $request->precio_min]);
            $query->where('Precio por unidad', '>=', $request->precio_min);
        }

        // Filtro por precio máximo
        if ($request->filled('precio_max')) {
            Log::info('Aplicando filtro precio máximo:', ['precio_max' => $request->precio_max]);
            $query->where('Precio por unidad', '<=', $request->precio_max);
        }

        // Filtro por tipo de propiedad
        if ($request->filled('tipo_propiedad')) {
            Log::info('Aplicando filtro tipo_propiedad:', ['tipo' => $request->tipo_propiedad]);
            $query->where('Entrega Inmediata/Preventa', $request->tipo_propiedad);
        }

        // Filtro por estado
        if ($request->filled('estado')) {
            Log::info('Aplicando filtro estado:', ['estado' => $request->estado]);
            $query->where('Entrega Inmediata/Preventa', $request->estado);
        }

        // VER LA QUERY SQL
        $sql = $query->toSql();
        $bindings = $query->getBindings();
        Log::info('SQL Query:', ['sql' => $sql, 'bindings' => $bindings]);

        $propiedades = $query->get();

        // VER RESULTADOS
        Log::info('Total propiedades encontradas:', ['cantidad' => $propiedades->count()]);

        // Ver precios de las primeras 5 propiedades
        $propiedades->take(5)->each(function ($prop) {
            Log::info('Propiedad:', [
                'id' => $prop->id,
                'nombre' => $prop->{'Nombre de la Propiedad'},
                'colonia' => $prop->Colonia,
                'precio' => $prop->{'Precio por unidad'},
                'tipo_precio' => gettype($prop->{'Precio por unidad'})
            ]);
        });

        Log::info('========== FIN BÚSQUEDA ==========');

        // Obtener colonias únicas
        $colonias = Propiedad::select('Colonia')
            ->whereNotNull('Colonia')
            ->where('Colonia', '!=', '')
            ->distinct()
            ->orderBy('Colonia')
            ->pluck('Colonia')
            ->filter(function ($value) {
                return !empty(trim($value));
            });

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
