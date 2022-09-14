<?php

namespace App\Http\Controllers;

use App\Models\Venta;
use Illuminate\Http\Request;

class VentaPasajeController extends Controller
{
    public function index(){
        $ventasPasaje = Venta::all();
        return view('ventasPasajes.index',compact('ventasPasaje'));
    }

    public function create(){
        
    }
}
