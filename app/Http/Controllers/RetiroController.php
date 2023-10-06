<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Retiro;

class RetiroController extends Controller
{
    public function index()
    {
        $retiros = Retiro::orderBy('id', 'DESC')->where('status', 'Pendiente')->get();
        $data = [];
        foreach ($retiros as $retiro) {
            $data[] = [
                'proyecto' => $retiro->proyecto->description,
                'proveedor' => $retiro->proveedor->name,
                'autor' => $retiro->autor->name . ' ' . $retiro->autor->middle_name . ' ' . $retiro->autor->last_name,
                'model' => $retiro,
            ];
        }
        return response()->json([
            'estatus' => 1,
            'message' => 'Información obtenida',
            'data' => $data
        ]);
    }

    public function show(Request $request)
    {
        $retiro = Retiro::find($request->retiro_id);
        return response()->json([
            'estatus' => 1,
            'message' => 'Información obtenida',
            'data' => [
                'proyecto' => $retiro->proyecto->description,
                'proveedor' => $retiro->proveedor->name,
                'autor' => $retiro->autor->name . ' ' . $retiro->autor->middle_name . ' ' . $retiro->autor->last_name,
                'model' => $retiro,
            ]
        ]);
    }

    public function aprobarRetiro(Request $request)
    {
        $retiro = Retiro::find($request->retiro_id);
        $retiro->whitdrawal_account_id = $request->whitdrawal_account_id;
        $retiro->whitdrawal_department_id = $request->whitdrawal_department_id;
        $retiro->status = 'Aprobado';
        $retiro->type = $request->type;
        if ($retiro->save()) {
            return response()->json([
                'estatus' => 1,
                'message' => 'Registro actualizado',
            ]);
        }
    }
}
