<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vehiculo;

class VehiculoController extends Controller
{
    public function index()
    {
        $items = Vehiculo::orderBy('brand')->with('tipo')->get();
        return response()->json([
            'data' => $items
        ]);
    }

    public function show(Request $request)
    {
        $item = Vehiculo::with('tipo')->find($request->vehiculo_id);
        return response()->json([
            'data' => $item
        ]);
    }
}
