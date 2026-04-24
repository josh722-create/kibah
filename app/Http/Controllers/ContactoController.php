<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class ContactoController extends Controller
{
    public function enviar(Request $request)
    {
        $request->validate([
            'fecha'      => 'required|date',
            'hora'       => 'required',
            'desarrollo' => 'required|string|max:255',
            'presupuesto' => 'required|string|max:255',
            'nombre'     => 'required|string|max:255',
            'telefono'   => 'required|string|max:30',
            'email'      => 'required|email|max:255',
            'mensaje'    => 'required|string|max:2000',
        ]);

        $payload = [
            'phone_number' => $request->telefono,
            'email'        => $request->email,
            'name'         => $request->nombre,
            'custom_fields' => [
                'fecha'             => $request->fecha,
                'hora'              => $request->hora,
                'rango_presupuesto' => $request->presupuesto,
                'mensaje'           => $request->mensaje,
                'desarrollo'        => $request->desarrollo,
            ],
        ];

        try {
            Http::withHeaders([
                'Authorization' => 'Bearer wha_tIEcpudsAstWsxppRDZVbMuLCTAdyvDT',
                'Content-Type'  => 'application/json',
            ])->post('https://api.whaapy.com/contacts/v1', $payload);
        } catch (\Exception $e) {
            Log::error('Whaapy webhook error: ' . $e->getMessage());
        }

        return redirect()->route('contacto.gracias');
    }

    public function enviarNosotros(Request $request)
    {
        $request->validate([
            'nombre'    => 'required|string|max:255',
            'apellido'  => 'required|string|max:255',
            'telefono'  => 'required|string|max:30',
            'email'     => 'required|email|max:255',
            'desarrollo'=> 'nullable|string|max:255',
            'presupuesto'=> 'required|string|max:255',
            'metros'    => 'nullable|string|max:100',
            'comentarios'=> 'nullable|string|max:2000',
        ]);

        $payload = [
            'phone_number' => $request->telefono,
            'email'        => $request->email,
            'name'         => trim($request->nombre . ' ' . $request->apellido),
            'custom_fields' => [
                'desarrollo'        => $request->desarrollo,
                'rango_presupuesto' => $request->presupuesto,
                'metros_cuadrados'  => $request->metros,
                'mensaje'           => $request->comentarios,
            ],
        ];

        try {
            Http::withHeaders([
                'Authorization' => 'Bearer wha_tIEcpudsAstWsxppRDZVbMuLCTAdyvDT',
                'Content-Type'  => 'application/json',
            ])->post('https://api.whaapy.com/contacts/v1', $payload);
        } catch (\Exception $e) {
            Log::error('Whaapy webhook error (nosotros): ' . $e->getMessage());
        }

        return redirect()->route('contacto.gracias');
    }
}
