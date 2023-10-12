<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ticket;

class CotizacionController extends Controller
{
    public function index()
    {
        $tickets = Ticket::with('cliente')
            ->with('departamento')
            ->with('autor')
            ->where('status', 'Pendiente')->orderBy('id', 'DESC')->limit(1)->paginate(10);
        return response()->json([
            'estatus' => 1,
            'message' => 'Información obtenida',
            'data' => $tickets
        ]);
    }

    public function show(Request $request)
    {
        $ticket = Ticket::with('cliente')
            ->with('departamento')
            ->with('autor')->find($request->ticket_id);
        return response()->json([
            'estatus' => 1,
            'message' => 'Información obtenida',
            'data' => $ticket
        ]);
    }

    public function enviarCotizacion(Request $request)
    {
        $ticket = Ticket::find($request->ticket_id);
        $correo =  $ticket->departamento->email;

        return $ticket;
    }

    public function actualizarEstatus(Request $request)
    {
        $ticket = Ticket::find($request->ticket_id);

        $ticket->investment = $request->investment;
        $ticket->status = $request->status;
        if ($request->status == 'Proyecto') {
            $last_proy = Ticket::whereNotNull('folio_proyecto')->orderBy('id', 'DESC')->first();
            $part = explode('-', $last_proy->folio_proyecto);
            $ticket->folio_proyecto = 'PROY-' . ($part[1] + 1);
            $ticket->project_at = date('Y-m-d H:i:s');
        }
        if ($ticket->save()) {
            return response()->json([
                'estatus' => 1,
                'message' => 'Información actualizada',
                'data' => $ticket
            ]);
        } else {
            return response()->json([
                'estatus' => 0,
                'message' => 'Error al procesar la solicitud',
            ]);
        }
    }

    public function editarCotizacion(Request $request)
    {
        $ticket = Ticket::find($request->ticket_id);

        $ticket->description = $request->description;
        $ticket->delivery_days = $request->delivery_days;
        $ticket->payment_type = $request->payment_type;
        $ticket->observation = $request->observation;
        $ticket->shipping = $request->shipping;
        $ticket->credit = $request->credit;
        $ticket->currency = $request->currency;

        if ($ticket->save()) {
            return response()->json([
                'estatus' => 1,
                'message' => 'Información actualizada',
                'data' => $ticket
            ]);
        } else {
            return response()->json([
                'estatus' => 0,
                'message' => 'Error al procesar la solicitud',
            ]);
        }
    }
}
