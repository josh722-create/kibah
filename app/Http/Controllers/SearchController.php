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

        // Variable para colonias seleccionadas
        $coloniasSeleccionadas = [];

        // Filtro por colonia (singular - desde formulario principal)
        if ($request->filled('colonia')) {
            Log::info('Aplicando filtro de colonia:', ['colonia' => $request->colonia]);
            $query->where('Colonia', $request->colonia);
            $coloniasSeleccionadas = [$request->colonia];
        }

        // Filtro por colonias (múltiples - desde header)
        if ($request->filled('colonias')) {
            $coloniasSeleccionadas = $request->colonias;
            Log::info('Aplicando filtro de colonias:', ['colonias' => $coloniasSeleccionadas]);
            $query->whereIn('Colonia', $coloniasSeleccionadas);
        }

        // Filtro por recámaras mínimas (desde header Y formulario principal)
        if ($request->filled('recamaras_min')) {
            $recamarasMin = $request->recamaras_min;
            Log::info('Aplicando filtro recámaras mínimas:', ['recamaras_min' => $recamarasMin]);

            if ($recamarasMin === '5') {
                // El máximo debe ser al menos 5
                $query->where('Recámaras Max', '>=', 5);
            } else {
                // El máximo debe ser al menos el mínimo solicitado
                $query->where('Recámaras Max', '>=', $recamarasMin);
            }
        }

        // Filtro por recámaras máximas (desde header)
        if ($request->filled('recamaras_max')) {
            $recamarasMax = $request->recamaras_max;
            Log::info('Aplicando filtro recámaras máximas:', ['recamaras_max' => $recamarasMax]);

            if ($recamarasMax !== '5') {
                // El mínimo debe ser como máximo el máximo solicitado
                $query->where('Recámaras Min', '<=', $recamarasMax);
            }
            // Si es 5+, no aplicamos límite superior
        }

        // Filtro por baños mínimos (desde formulario principal)
        if ($request->filled('banos_min')) {
            $banosMin = $request->banos_min;
            Log::info('Aplicando filtro baños mínimos:', ['banos_min' => $banosMin]);

            if ($banosMin === '5') {
                // El máximo debe ser al menos 5
                $query->where('Baños Max', '>=', 5);
            } else {
                // El máximo debe ser al menos el mínimo solicitado
                $query->where('Baños Max', '>=', $banosMin);
            }
        }

        // Filtro por precio mínimo
        if ($request->filled('precio_min')) {
            Log::info('Aplicando filtro precio mínimo:', ['precio_min' => $request->precio_min]);
            // El precio máximo de la propiedad debe ser al menos el mínimo solicitado
            $query->where('Precio Max', '>=', $request->precio_min);
        }

        // Filtro por precio máximo
        if ($request->filled('precio_max')) {
            Log::info('Aplicando filtro precio máximo:', ['precio_max' => $request->precio_max]);
            // El precio mínimo de la propiedad debe ser como máximo el máximo solicitado
            $query->where('Precio Min', '<=', $request->precio_max);
        }

        // Filtro por tipo de propiedad
        if ($request->filled('tipo_propiedad')) {
            Log::info('Aplicando filtro tipo_propiedad:', ['tipo' => $request->tipo_propiedad]);
            $query->where('Entrega Inmediata/Preventa', $request->tipo_propiedad);
        }

        // Filtro por estado (desde header)
        if ($request->filled('estado')) {
            Log::info('Aplicando filtro estado:', ['estado' => $request->estado]);
            $query->where('Entrega Inmediata/Preventa', $request->estado);
        }

        // VER LA QUERY SQL
        $sql = $query->toSql();
        $bindings = $query->getBindings();
        Log::info('SQL Query:', ['sql' => $sql, 'bindings' => $bindings]);

        $propiedades = $query->get();

        Log::info('Total propiedades encontradas:', ['cantidad' => $propiedades->count()]);
        Log::info('========== FIN BÚSQUEDA ==========');

        // Obtener colonias únicas (todas disponibles)
        $colonias = Propiedad::select('Colonia')
            ->whereNotNull('Colonia')
            ->where('Colonia', '!=', '')
            ->distinct()
            ->orderBy('Colonia')
            ->pluck('Colonia')
            ->filter(function ($value) {
                return !empty(trim($value));
            });

        return view('propiedades', compact('propiedades', 'colonias', 'coloniasSeleccionadas'));
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
            ->where('id', '!=', $id)
            ->inRandomOrder()
            ->limit(8)
            ->get();

        $propiedadIndividual = Propiedad::whereIn('id', [1964, 1963, 1904, 1909])
            ->where('id', '!=', $id)
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
