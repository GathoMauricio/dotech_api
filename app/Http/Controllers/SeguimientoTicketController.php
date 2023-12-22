<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SeguimientoTicket;

class SeguimientoTicketController extends Controller
{
    public function index(Request $request)
    {
        $seguimientos = SeguimientoTicket::with('autor')->where('sale_id', $request->ticket_id)->get();
        return response()->json([
            'estatus' => 1,
            'message' => 'Información obtenida',
            'data' => $seguimientos
        ]);
    }

    public function store(Request $request)
    {
        $seguimiento = SeguimientoTicket::create([
            'sale_id' => $request->ticket_id,
            'author_id' => auth()->user()->id,
            'body' => $request->body,
        ]);
        if ($seguimiento) {
            return response()->json([
                'status' => 1,
                'message' => 'Ptición procesada'
            ]);
        } else {
            return response()->json([
                'status' => 0,
                'message' => 'Error en la peticion'
            ]);
        }
        return $request;
    }
}
