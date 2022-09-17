<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Bus;
use App\Models\Ruta;
use App\Models\Venta;
use App\Models\Viaje;
use App\Models\Chofer;
use Illuminate\Http\Request;
use App\Models\DetalleVenta;
use PDF;
use Illuminate\Support\Facades\Auth;

class ViajeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $viajes = Viaje::all();

        return view('viajes.index', compact('viajes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $fecha = Carbon::now()->toDateString();
        $choferes = Chofer::all();
        $buses = Bus::where('estado', 'A')->get();
        $rutas = Ruta::all();
        return view('viajes.create', compact('choferes', 'buses', 'rutas', 'fecha'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'fecha_salida' => 'required',
            'hora_salida' => 'required',
            'chofer' => 'required',
            'bus' => 'required',
            'ruta' => 'required',
            'precio_asiento' => 'required',
        ];

        $messages = [
            'fecha_salida.required' => 'Debe colocar una fecha de salida',
            'hora_salida.required' => 'Debe colocar una hora de  salida',
            'chofer.required' => 'Debe seleccionar un Chofer',
            'bus.required' => 'Debe seleccionar un Bus',
            'ruta.required' => 'Debe seleccionar una Ruta',
            'precio_asiento.required' => 'Debe colocar un precio',
        ];

        $this->validate($request, $rules, $messages);

        $viaje = new Viaje();
        $viaje->fecha_salida = $request->fecha_salida;
        $viaje->hora_salida = $request->hora_salida;
        $viaje->estado = 'E'; //E = En espera , V = En Proceso de Viaje , C = Viaje Concluido
        $viaje->precio_asiento =  $request->precio_asiento;
        $viaje->chofer_id =  $request->chofer;
        $viaje->bus_id =  $request->bus;
        $viaje->ruta_id =  $request->ruta;
        $viaje->save();

        return redirect()->route('viajes.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $fecha = Carbon::now()->toDateString();
        $viaje = Viaje::find($id);

        return view('viajes.show', compact('viaje', 'fecha'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $viaje = Viaje::find($id);
        $choferes = Chofer::all();
        $buses = Bus::where('estado', 'A')->get();
        $rutas = Ruta::all();
        return view('viajes.edit', compact('viaje', 'choferes', 'buses', 'rutas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $viaje = Viaje::find($id);
        $viaje->fecha_salida = $request->fecha_salida;
        $viaje->hora_salida = $request->hora_salida;
        $viaje->estado = 'E'; //E = En espera , V = En Proceso de Viaje , C = Viaje Concluido
        $viaje->chofer_id =  $request->chofer;
        $viaje->bus_id =  $request->bus;
        $viaje->ruta_id =  $request->ruta;
        $viaje->save();

        return redirect()->route('viajes.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $viaje = Viaje::find($id);

        $viaje->delete();

        return redirect()->route('viajes.index');
    }

    public function reporteViajes(Request $request)
    {
        /* dd($request); */
        $fecha_inicial = $request->fecha_inicial;
        $fecha_final = $request->fecha_final;
        $ruta_llegada = $request->lugar_llegada;

        $fecha_inicial_formatada = (new Carbon($fecha_inicial))->format('Y-m-d');
        $fecha_final_formatada = (new Carbon($fecha_final))->format('Y-m-d');


        $rutas = Ruta::all();

        $viajes = Viaje::selectRaw('viajes.id,rutas.lugar_llegada,viajes.fecha_salida,viajes.hora_salida,personas.nombre,personas.apellido,choferes.licencia_conducir')
            ->join('choferes', 'choferes.id', '=', 'viajes.chofer_id')
            ->join('personas', 'personas.id', '=', 'choferes.persona_id')
            ->join('rutas', 'rutas.id', '=', 'viajes.ruta_id')
            ->wherebetween('viajes.fecha_salida', [$fecha_inicial_formatada, $fecha_final_formatada])
            ->where('rutas.id', $ruta_llegada)
            ->where('viajes.estado', 'E')
            ->get();
        /*   */

        return view('viajes.reportes.ReporteViajes', compact('viajes', 'rutas', 'fecha_inicial_formatada', 'fecha_final_formatada'));
    }

    public function detalleReporteViaje($viaje_id, $fecha_inicial_formatada, $fecha_final_formatada)
    {
        $ventas_viajes = Venta::selectRaw('ventas_pasajes.id,detalles_venta.viaje_id,personas.nombre,personas.apellido,ventas_pasajes.fecha_venta,
        ventas_pasajes.total,detalles_venta.cantidad,viajes.precio_asiento,buses.marca,buses.modelo,buses.cantidad_max_asientos,users.name,users.email')
            ->join('detalles_venta', 'detalles_venta.venta_id', '=', 'ventas_pasajes.id')
            ->join('viajes', 'viajes.id', '=', 'detalles_venta.viaje_id')
            ->join('users', 'users.id', '=', 'ventas_pasajes.user_id')
            ->join('pasajeros', 'pasajeros.id', '=', 'ventas_pasajes.pasajero_id')
            ->join('personas', 'personas.id', '=', 'pasajeros.persona_id')
            ->join('buses', 'buses.id', '=', 'viajes.bus_id')
            ->where('detalles_venta.viaje_id', $viaje_id)
            ->whereBetween('ventas_pasajes.fecha_venta', [$fecha_inicial_formatada, $fecha_final_formatada])
            ->where('ventas_pasajes.user_id', Auth::user()->id)
            ->get();

        $viaje = Viaje::find($ventas_viajes[0]->viaje_id);
        

        $asientos_reservados = Venta::selectRaw('asientos.id,asientos.color,asientos.numero_asiento,asientos.estado,personas.nombre as nombrePasajero')
            ->join('pasajeros', 'pasajeros.id', '=', 'ventas_pasajes.pasajero_id')
            ->join('personas', 'personas.id', '=', 'pasajeros.persona_id')
            ->join('detalles_venta', 'detalles_venta.venta_id', '=', 'ventas_pasajes.id')
            ->join('viajes', 'viajes.id', '=', 'detalles_venta.viaje_id')
            ->join('buses', 'buses.id', '=', 'viajes.bus_id')
            ->join('asientos', 'asientos.bus_id', '=', 'buses.id')
            ->where('detalles_venta.viaje_id', $viaje_id)
            ->where('asientos.estado', 'R')
            /* ->where('pasajeros.id', $ventas_viajes[0]->pasajero_id) */
            ->get();





        /* dd($asientos_reservados); */

        return view('viajes.reportes.detalleReporteViaje', compact('viaje_id', 'fecha_inicial_formatada', 'fecha_final_formatada', 'ventas_viajes', 'asientos_reservados', 'viaje'));
    }

    public function detalleReporteViajePDF($viaje_id, $fecha_inicial_formatada, $fecha_final_formatada)
    {
        $ventas_viajes = Venta::selectRaw('ventas_pasajes.id,detalles_venta.viaje_id,personas.nombre,personas.apellido,ventas_pasajes.fecha_venta,
        ventas_pasajes.total,detalles_venta.cantidad,viajes.precio_asiento,buses.marca,buses.modelo,buses.cantidad_max_asientos,users.name,users.email')
            ->join('detalles_venta', 'detalles_venta.venta_id', '=', 'ventas_pasajes.id')
            ->join('viajes', 'viajes.id', '=', 'detalles_venta.viaje_id')
            ->join('users', 'users.id', '=', 'ventas_pasajes.user_id')
            ->join('pasajeros', 'pasajeros.id', '=', 'ventas_pasajes.pasajero_id')
            ->join('personas', 'personas.id', '=', 'pasajeros.persona_id')
            ->join('buses', 'buses.id', '=', 'viajes.bus_id')
            ->where('detalles_venta.viaje_id', $viaje_id)
            ->whereBetween('ventas_pasajes.fecha_venta', [$fecha_inicial_formatada, $fecha_final_formatada])
            ->where('ventas_pasajes.user_id', Auth::user()->id)
            ->get();

        $viaje = Viaje::find($ventas_viajes[0]->viaje_id);
        

        $asientos_reservados = Venta::selectRaw('asientos.id,asientos.color,asientos.numero_asiento,asientos.estado,personas.nombre as nombrePasajero')
            ->join('pasajeros', 'pasajeros.id', '=', 'ventas_pasajes.pasajero_id')
            ->join('personas', 'personas.id', '=', 'pasajeros.persona_id')
            ->join('detalles_venta', 'detalles_venta.venta_id', '=', 'ventas_pasajes.id')
            ->join('viajes', 'viajes.id', '=', 'detalles_venta.viaje_id')
            ->join('buses', 'buses.id', '=', 'viajes.bus_id')
            ->join('asientos', 'asientos.bus_id', '=', 'buses.id')
            ->where('detalles_venta.viaje_id', $viaje_id)
            ->where('asientos.estado', 'R')
            /* ->where('pasajeros.id', $ventas_viajes[0]->pasajero_id) */
            ->get();
        view()->share('viajes.detalleViaje-PDF', $asientos_reservados);
        view()->share('viajes.detalleViaje-PDF', $ventas_viajes);
        view()->share('viajes.detalleViaje-PDF', $viaje);

        $pdf = PDF::loadView('viajes.reportes.detalleReporteViaje-PDF', [
            'asientos_reservados' => $asientos_reservados,
            'ventas_viajes' => $ventas_viajes,
            'viaje' => $viaje,
        ])->setOptions(['defaultFont' => 'sans-serif', 'isRemoteEnabled' => true]);

        return $pdf->stream('Detalle-Viaje-' . $viaje->id . '.pdf', ['Attachment' => false]);
    }
}
