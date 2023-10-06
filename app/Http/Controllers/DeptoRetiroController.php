<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DeptoRetiro;

class DeptoRetiroController extends Controller
{
    public function index()
    {
        $deptos = DeptoRetiro::orderBy('name')->get();
        return response()->json([
            'estatus' => 1,
            'message' => 'Información obtenida',
            'data' => $deptos
        ]);
    }
}
