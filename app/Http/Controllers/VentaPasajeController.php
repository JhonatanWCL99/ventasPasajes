<?php

namespace App\Http\Controllers;

use App\Models\Asiento;
use App\Models\Bus;
use App\Models\DetalleVenta;
use App\Models\Venta;
use App\Models\User;
use App\Models\Pasajero;
use App\Models\Viaje;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VentaPasajeController extends Controller
{
    public function index()
    {
        $ventasPasaje = Venta::all();
        return view('ventasPasajes.index', compact('ventasPasaje'));
    }

    public function create()
    {

        $pasajeros = Pasajero::all();
        $viajes = Viaje::where([
            'estado' => 'E',
        ])->get();
        $fecha_actual = Carbon::now()->toDateString();
        $hora_actual = Carbon::now()->toTimeString();
        return view('ventasPasajes.create', compact('pasajeros', 'viajes', 'fecha_actual', 'hora_actual'));
    }

    public function store(Request $request)
    {

        $viaje = Viaje::find($request->viaje);

       /*  dd($request); */
        $venta = new Venta();
        $venta->fecha_venta = Carbon::now();
        $venta->hora_venta = Carbon::now()->toTimeString();
        $venta->pasajero_id = $request->pasajero;
        $venta->user_id = Auth::user()->id;
        $venta->total = sizeof($request->asientos) * $viaje->precio_asiento;
        $venta->save();

        $detalle_venta = new DetalleVenta();
        $detalle_venta->cantidad = sizeof($request->asientos);
        $detalle_venta->subtotal = sizeof($request->asientos) * $viaje->precio_asiento;
        $detalle_venta->viaje_id = $viaje->id;
        $detalle_venta->venta_id = $venta->id;
        $detalle_venta->save();

        foreach ($request->asientos as $asiento_id) {
            $asiento = Asiento::find($asiento_id);
            $asiento->estado = 'R';
            $asiento->save();
        }

        return redirect()->route('ventasPasajes.index');
    }

    public function obtenerDatoViaje(Request $request)
    {
        $viaje = Viaje::where([
            'id' => $request->viaje_id,
            'estado' => 'E',
        ])->first();

        $bus = Bus::find($viaje->bus_id);

        $asientos = Asiento::where('estado', 'L')->where('bus_id', $bus->id)->get();

        return response()->json([
            "viaje" => $viaje,
            "ruta" => $viaje->ruta->lugar_origen . " - " . $viaje->ruta->lugar_llegada,
            "chofer" => $viaje->chofer->persona->nombre,
            "bus" => $bus->placa,
            "asientos" => $asientos,
        ]);
    }

    public function show($id)
    {
        $venta = Venta::find($id);
        return view('ventasPasajes.show', compact('venta'));
    }

    public function destroy($id)
    {
        Venta::destroy($id);

        return redirect()->route('ventasPasajes.index');
    }
}
