<?php

namespace App\Http\Controllers;
use App\Models\Persona;
use App\Models\Asistente;
use Illuminate\Http\Request;

class AsistenteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $asistentes = Asistente::all();
        return view('asistentes.index',compact('asistentes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        $asistente = Asistente::find($id);

        return view('asistentes.edit', compact('asistente'));
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
        $asistente = Asistente::find($id);
        $persona = Persona::find($asistente->persona_id);

        $persona->nombre = $request->asistente_nombre;
        $persona->apellido = $request->asistente_apellido;
        $asistente->cargo = $request->cargo;

        $persona->save();
        $asistente->save();

        return redirect()->route('asistentes.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $asistente = Asistente::find($id);
        $asistente->delete();
        return redirect()->route('asistentes.index');
    }
}
