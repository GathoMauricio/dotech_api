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
        $ticket['precio_venta'] = number_format($ticket->estimated + ($ticket->estimated * 0.16), 2);
        $totalRetiros = 0;
        foreach ($ticket->retiros as $retiro) {
            $totalRetiros += floatval($retiro->quantity);
        }
        $ticket['utilidad'] = number_format($ticket->estimated + ($ticket->estimated * 0.16) - $totalRetiros, 2);
        $ticket['total_retiros'] = number_format($totalRetiros, 2);
        $comision = ($ticket->estimated + ($ticket->estimated * 0.16) - $totalRetiros) / 1.16;
        $comision = number_format($comision * ($ticket->commision_percent / 100), 2);
        $ticket['comision'] = $comision;

        $ticket['cantidad_productos'] = $ticket->productos->count();
        $ticket['cantidad_pagos'] = $ticket->pagos->count();
        $ticket['cantidad_facturas'] = $ticket->documentos->count();
        $ticket['cantidad_retiros'] = $ticket->retiros->count();
        $ticket['cantidad_bitacoras'] = $ticket->bitacoras->count();
        $ticket['cantidad_seguimientos'] = $ticket->seguimientos->count();

        return response()->json([
            'estatus' => 1,
            'message' => 'Información obtenida',
            'data' => $ticket
        ]);
    }
}
