<?php

namespace App\Http\Controllers;

use App\Models\generador;
use App\Models\corrientes;
use App\Models\corrientesgenerador;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CorrientesgeneradorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function traerDatos()
    {
        $generador = generador::all();
        $corrientes = corrientes::all();

        return view('generadores.corrientes', compact('generador', 'corrientes'));
    }


    public function index()
    {
        //
        $corrientes = corrientesgenerador::all();
        return view('generadores.listacorrientes', ['corrientes' => $corrientes]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $datosCorrientes = request()->except('_token');

        corrientesgenerador::insert($datosCorrientes);

        return redirect('/listacorrientesgeneradores')->with('success_message', 'Corriente cargada con exito');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
        $id2 = corrientesgenerador::find($id);
        return view('generadores.editarcorriente', ['id' => $id2]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(corrientesgenerador $corrientesgenerador)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, corrientesgenerador $corrientesgenerador)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(corrientesgenerador $corrientesgenerador)
    {
        //
    }
}
