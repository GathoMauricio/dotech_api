<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductoTicket;

class ProductoTicketController extends Controller
{
    public function index(Request $request)
    {
        $data = ProductoTicket::where('sale_id', $request->ticket_id)->get();
        #suma el total de los productos
        $subtotal = $data->sum('total_sell');
        #calcula el iva
        $iva = ($subtotal * .16);
        #calcula el total de la cotización
        $total = $subtotal + $iva;
        return response()->json([
            'estatus' => 1,
            'message' => 'Información obtenida',
            'data' => $data
        ]);
    }
}
