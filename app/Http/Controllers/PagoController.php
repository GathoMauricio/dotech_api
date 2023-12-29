<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PagoTicket;

class PagoController extends Controller
{
    public function index(Request $request)
    {
        $items = PagoTicket::where('sale_id', $request->ticket_id)->with('ticket')->get();
        return response()->json([
            'data' => $items
        ]);
    }
}
