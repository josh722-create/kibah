<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Propiedad;

class HomeController extends Controller
{
    public function index()
    {
        $propiedades = Propiedad::take(12)->get();
        $totalPropiedades = Propiedad::count();
        $colonias = Propiedad::select('Colonia')
            ->whereNotNull('Colonia')
            ->where('Colonia', '!=', '')
            ->distinct()
            ->orderBy('Colonia')
            ->pluck('Colonia')
            ->filter(function ($value) {
                return !empty(trim($value));
            });

        return view('welcome', compact('propiedades', 'colonias', 'totalPropiedades'));
    }

    public function cargarMas(Request $request)
    {
        $offset = (int) $request->get('offset', 0);
        $propiedades = Propiedad::skip($offset)->take(12)->get();
        return response()->json($propiedades);
    }
}
