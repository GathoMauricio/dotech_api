<?php

namespace App\Http\Controllers;

use App\Models\DocumentoVehiculo;
use App\Models\FotoHistoriaVehiculo;
use App\Models\FotoVehiculo;
use App\Models\HistoriaVehiculo;
use App\Models\VerificacionVehiculo;
use Illuminate\Http\Request;
use App\Models\Vehiculo;
use App\Models\MantenimientoVehiculo;
use App\Models\FotoMantenimientoVehiculo;
use App\Models\TipoMantenimientoVehiculo;
use Illuminate\Support\Facades\Auth;

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

    public function documentos(Request $request)
    {
        $items = DocumentoVehiculo::where('vehicle_id', $request->vehiculo_id)->orderBy('created_at', 'DESC')
            ->with('autor')
            ->with('vehiculo')
            ->get();
        return response()->json([
            'data' => $items
        ]);
    }

    public function storeSalida(Request $request)
    {
        $salida = HistoriaVehiculo::create([
            'author_id' => Auth::user()->id,
            'vehicle_id' => $request->vehicle_id,
            'kilometers' => $request->kilometers,
            'description' => $request->description,
            'observation' => $request->observation,
        ]);

        if ($salida) {
            return response()->json([
                'estatus' => 'OK',
                'data' => $salida
            ], 200);
        } else {
            return response()->json([
                'estatus' => 'FAIL',
            ]);
        }
    }

    public function storeImagenSalida(Request $request)
    {
        $archivo = $request->image;
        $archivo = str_replace('data:image/png;base64,', '', $archivo);
        $archivo = str_replace(' ', '+', $archivo);
        $ruta = '/app/public/salidas_imagenes/';
        $foto = FotoHistoriaVehiculo::create([
            'author_id' => Auth::user()->id,
            'vehicle_history_id' => $request->vehicle_history_id,
            'image' => 'pendiente',
            'description' => $request->description,
            'source' => 'API',
        ]);
        if ($foto) {
            $nombreArchivo =  $request->vehicle_history_id . '_' . $foto->id . '_' . '.png';
            $foto->image = $nombreArchivo;
            $foto->save();
            \File::put(storage_path($ruta . $nombreArchivo), base64_decode($archivo));
            return request()->json([
                'estatus' => 'OK'
            ]);
        } else {
            return request()->json(['estatus' => 'FAIL']);
        }
    }

    public function storeMantenimiento(Request $request)
    {
        $mantenimiento = MantenimientoVehiculo::create([
            'author_id' => Auth::user()->id,
            'maintenance_type_id' => $request->maintenance_type_id,
            'vehicle_id' => $request->vehicle_id,
            'kilometers' => $request->kilometers,
            'date' => $request->date,
            'amount' => $request->amount,
            'description' => $request->description,
        ]);

        if ($mantenimiento) {
            return response()->json([
                'estatus' => 'OK',
                'data' => $mantenimiento
            ], 200);
        } else {
            return response()->json([
                'estatus' => 'FAIL',
            ]);
        }
    }

    public function storeImagenMantenimiento(Request $request)
    {
        $archivo = $request->image;
        $archivo = str_replace('data:image/png;base64,', '', $archivo);
        $archivo = str_replace(' ', '+', $archivo);
        $ruta = '/app/public/mantenimientos_imagenes/';
        $foto = FotoMantenimientoVehiculo::create([
            'author_id' => Auth::user()->id,
            'maintenance_id' => $request->maintenance_id,
            'image' => 'pendiente',
            'description' => $request->description,
            'source' => 'API',
        ]);
        if ($foto) {
            $nombreArchivo =  $request->maintenance_id . '_' . $foto->id . '_' . '.png';
            $foto->image = $nombreArchivo;
            $foto->save();
            \File::put(storage_path($ruta . $nombreArchivo), base64_decode($archivo));
            return request()->json([
                'estatus' => 'OK'
            ]);
        } else {
            return request()->json(['estatus' => 'FAIL']);
        }
    }

    public function tiposMantenimientos(Request $request)
    {
        $tipos = TipoMantenimientoVehiculo::orderBy('type')->get();
        return response()->json([
            'estatus' => 'OK',
            'data' => $tipos,
        ]);
    }

    public function storeVerificacion(Request $request)
    {
        $verificacion =  VerificacionVehiculo::create([
            'author_id' => Auth::user()->id,
            'vehicle_id' => $request->vehicle_id,
            'date' => $request->date,
            'kilometers' => $request->kilometers,
            'type' => $request->kilometers,
            'image' => 'pendiente',
            'source' => 'API',
        ]);

        if ($verificacion) {
            $archivo = $request->image;
            $archivo = str_replace('data:image/png;base64,', '', $archivo);
            $archivo = str_replace(' ', '+', $archivo);
            $ruta = '/app/public/verificaciones_imagenes/';
            $nombreArchivo =   "IMG_" . $verificacion->id . '.png';
            $verificacion->image = $nombreArchivo;
            $verificacion->save();
            \File::put(storage_path($ruta . $nombreArchivo), base64_decode($archivo));
            return request()->json([
                'estatus' => 'OK'
            ]);
        } else {
            return request()->json(['estatus' => 'FAIL']);
        }
    }
}
