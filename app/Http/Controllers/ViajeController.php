<?php

namespace App\Http\Controllers;

use App\Models\Bus;
use App\Models\Chofer;
use App\Models\Ruta;
use App\Models\Viaje;
use Carbon\Carbon;
use Illuminate\Http\Request;

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
        $rules =[
            'fecha_salida' => 'required',
            'hora_salida' => 'required',
            'chofer' =>'required',
            'bus' =>'required',
            'ruta' =>'required'
        ];

        $messages =[
            'fecha_salida.required' => 'Debe colocar una fecha de salida',
            'hora_salida.required' => 'Debe colocar una hora de  salida',
            'chofer.required' => 'Debe seleccionar un Chofer',
            'bus.required' => 'Debe seleccionar un Bus',
            'ruta.required' => 'Debe seleccionar una Ruta',
        ];

        $this->validate($request, $rules, $messages);

        $viaje = new Viaje();
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
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $fecha = Carbon::now()->toDateString();
        $viaje = Viaje::find($id);

        return view('viajes.show',compact('viaje','fecha'));
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
}
