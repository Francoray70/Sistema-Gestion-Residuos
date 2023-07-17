<?php

namespace App\Http\Controllers;

use App\Models\provincia;
use App\Models\localidades;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LocalidadesController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function traerDatos()
    {
        //
        $provincias = provincia::orderBy('provincia')->get();
        return view('varios.localidades', ['provincias' => $provincias]);
    }

    public function index()
    {
        //
        $ciudades = Localidades::all();
        return view('varios.listalocalidades', ['ciudades' => $ciudades]);
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
        $localidades = request()->except('_token');

        Localidades::insert($localidades);

        return redirect('/listalocalidades')->with('success', 'Actividad cargada con exito!');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
        $provincias = provincia::orderBy('provincia')->get();
        $id = Localidades::find($id);
        return view('varios.editarlocalidad', compact('id', 'provincias'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(localidades $cr)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //
        $datosLocalidades = request()->except(['_token', '_method']);
        Localidades::where('id', '=', $id)->update($datosLocalidades);

        return redirect('/listalocalidades')->with('success', 'Actividad cargada con exito!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(localidades $cr)
    {
        //
    }
}
