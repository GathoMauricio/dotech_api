<?php

namespace App\Http\Controllers;

use App\Models\FotoVehiculo;
use App\Models\HistoriaVehiculo;
use App\Models\VerificacionVehiculo;
use Illuminate\Http\Request;
use App\Models\Vehiculo;
use App\Models\MantenimientoVehiculo;

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
        $items = FotoVehiculo::where('vehicle_id', $request->vehiculo_id)->orderBy('created_at')->with('vehiculo')->get();
        return response()->json([
            'data' => $items
        ]);
    }

    public function mantenimientos(Request $request)
    {
        $items = MantenimientoVehiculo::where('vehicle_id', $request->vehiculo_id)->orderBy('created_at', 'DESC')
            ->with('autor')
            ->with('tipo')
            ->with('vehiculo')
            ->get();
        return response()->json([
            'data' => $items
        ]);
    }

    public function showMantenimiento(Request $request)
    {
        $item = MantenimientoVehiculo::with('autor')
            ->with('tipo')
            ->with('vehiculo')
            ->with('fotos')
            ->find($request->mantenimiento_id);
        return response()->json([
            'data' => $item
        ]);
    }

    public function historias(Request $request)
    {
        $items = HistoriaVehiculo::where('vehicle_id', $request->vehiculo_id)->orderBy('created_at', 'DESC')
            ->with('autor')
            ->with('vehiculo')
            ->get();
        return response()->json([
            'data' => $items
        ]);
    }

    public function showHistoria(Request $request)
    {
        $item = HistoriaVehiculo::with('autor')
            ->with('autor')
            ->with('vehiculo')
            ->with('fotos')
            ->find($request->historia_id);
        return response()->json([
            'data' => $item
        ]);
    }

    public function verificaciones(Request $request)
    {
        $items = VerificacionVehiculo::where('vehicle_id', $request->vehiculo_id)->orderBy('created_at', 'DESC')
            ->with('autor')
            ->with('vehiculo')
            ->get();
        return response()->json([
            'data' => $items
        ]);
    }
}
