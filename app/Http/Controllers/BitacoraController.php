<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bitacora;

class BitacoraController extends Controller
{
    public function index(Request $request)
    {
        $bitacoras = Bitacora::where('sale_id', $request->ticket_id)
            ->with('ticket')
            ->with('autor')
            ->get();
        $data = [];
        foreach ($bitacoras as $bitacora) {
            $data[] = [
                'id' => $bitacora->id,
                'author_id' => $bitacora->author_id,
                'description' => $bitacora->description,
            ];
        }
        return response()->json([
            'estatus' => 1,
            'message' => 'Información obtenida',
            'data' => $bitacoras
        ]);
    }
    public function index2(Request $request)
    {
        $bitacoras = Bitacora::with('ticket')
            ->with('autor')
            ->orderBy('id', 'DESC')
            ->get();
        $data = [];
        foreach ($bitacoras as $bitacora) {
            $data[] = [
                'id' => $bitacora->id,
                'author_id' => $bitacora->author_id,
                'description' => $bitacora->description,
            ];
        }
        return response()->json([
            'estatus' => 1,
            'message' => 'Información obtenida',
            'data' => $bitacoras
        ]);
    }
}
