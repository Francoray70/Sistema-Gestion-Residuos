<?php

namespace App\Http\Controllers;

use App\Models\generador;
use App\Models\provincia;
use App\Models\direccion;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DireccionController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function traerDatos()
    {
        //
        $generador = generador::all();
        $provincias = provincia::all();
        return view('generadores.direcciones', compact('generador', 'provincias'));
    }


    public function index()
    {
        //
        $direcciones = direccion::all();
        return view('generadores.listadirecciones', ['direcciones' => $direcciones]);
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
        $datosDirecciones = request()->except('_token');

        direccion::insert($datosDirecciones);

        return redirect('/listadirecciones')->with('success_message', 'Direccion cargada con exito');
    }

    /**
     * Display the specified resource.
     */
    public function show(direccion $direccion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(direccion $direccion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, direccion $direccion)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(direccion $direccion)
    {
        //
    }
}
