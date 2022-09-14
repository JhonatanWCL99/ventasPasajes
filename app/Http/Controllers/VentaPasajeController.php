<?php

namespace App\Http\Controllers;

use App\Models\Venta;
use App\Models\User;
use App\Models\Pasajero;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VentaPasajeController extends Controller
{
    public function index(){
        $ventasPasaje = Venta::all();
        return view('ventasPasajes.index',compact('ventasPasaje'));
    }

    public function create(){

        $pasajeros = Pasajero::all();
        return view('ventasPasajes.create',compact('pasajeros'));
    }

    public function store(Request $request){
        $venta = new Venta();
        $venta->fecha_venta = $request->fecha_venta;
        $venta->hora_venta = $request->hora_venta;
        $venta->pasajero_id = $request->pasajero_id;
        $venta->user_id = Auth::user()->id;
        $venta->save();

    }
}
