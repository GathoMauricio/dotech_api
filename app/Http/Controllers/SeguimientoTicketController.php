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
}
