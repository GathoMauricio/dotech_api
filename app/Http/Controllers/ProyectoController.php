<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ticket;

class ProyectoController extends Controller
{
    public function index()
    {
        $tickets = Ticket::with('cliente')
            ->with('departamento')
            ->with('autor')
            ->where('status', 'Proyecto')->orderBy('id', 'DESC')->limit(1)->paginate(10);
        return response()->json([
            'estatus' => 1,
            'message' => 'Información obtenida',
            'data' => $tickets
        ]);
    }

    public function show(Request $request)
    {
        $ticket = Ticket::with('cliente')
            ->with('departamento')
            ->with('autor')->find($request->ticket_id);
        return response()->json([
            'estatus' => 1,
            'message' => 'Información obtenida',
            'data' => $ticket
        ]);
    }
}
