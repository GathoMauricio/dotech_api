<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    public function index()
    {
        $clientes = Cliente::where('status', 'Cliente')->orderBy('name')->get();
        return response()->json([
            'estatus' => 1,
            'message' => 'Información obtenida',
            'data' => $clientes
        ]);
    }

    public function buscar(Request $request)
    {
        $clientes = Cliente::where('status', 'Cliente')
            ->where('name', 'LIKE', '%' . $request->nombre_cliente . '%')
            ->orderBy('name')->get();
        return response()->json([
            'estatus' => 1,
            'message' => 'Información obtenida',
            'data' => $clientes
        ]);
    }

    public function show(Request $request)
    {
        $cliente = Cliente::find($request->cliente_id);
        $cliente['num_departamentos'] = $cliente->departamentos->count();
        $cliente['num_cotizaciones'] = $cliente->tickets->where('status', 'Pendiente')->count();
        $cliente['num_proyectos'] = $cliente->tickets->where('status', 'Proyecto')->count();
        $cliente['num_finalizados'] = $cliente->tickets->where('status', 'Finalizado')->count();
        $cliente['num_rechazados'] = $cliente->tickets->where('status', 'Rechazada')->count();
        return response()->json([
            'estatus' => 1,
            'message' => 'Información obtenida',
            'data' => $cliente
        ]);
    }
}
