<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CuentaRetiro;

class CuentaRetiroController extends Controller
{
    public function index()
    {
        $cuentas = CuentaRetiro::orderBy('name')->get();
        return response()->json([
            'estatus' => 1,
            'message' => 'Información obtenida',
            'data' => $cuentas
        ]);
    }
}
