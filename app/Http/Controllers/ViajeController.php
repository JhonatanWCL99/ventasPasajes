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
        //
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
        $buses = Bus::where('estado','A')->get();
        $rutas = Ruta::all();
        return view('viajes.create',compact('choferes','buses','rutas','fecha'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
