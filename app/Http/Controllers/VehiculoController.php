<?php

namespace App\Http\Controllers;

use App\Models\FotoVehiculo;
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

    public function fotos(Request $request)
    {
        $items = FotoVehiculo::where('vehicle_id', $request->vehiculo_id)->orderBy('created_At')->with('vehiculo')->get();
        return response()->json([
            'data' => $items
        ]);
    }
}
