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
        $provincias = provincia::orderBy('provincia')->get();
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
    public function show($id)
    {
        //
        $provincias = provincia::orderBy('provincia')->get();
        $id = direccion::find($id);
        return view('generadores.editardirecciones', compact('provincias', 'id'));
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
    public function update(Request $request, $id)
    {
        //
        $datosDireccion = request()->except(['_token', '_method']);
        direccion::where('id', '=', $id)->update($datosDireccion);

        return redirect('/listadirecciones')->with('success_message', 'Direccion cargada con exito');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(direccion $direccion)
    {
        //
    }
}
