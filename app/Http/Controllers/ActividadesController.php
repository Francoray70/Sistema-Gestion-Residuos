<?php

namespace App\Http\Controllers;

use App\Models\actividades;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ActividadesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $actividades = actividades::all();
        return view('varios.listactividades', ['actividades' => $actividades]);
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
        $actividades = request()->except('_token');

        actividades::insert($actividades);

        return redirect('/listaactividades')->with('success', 'Actividad cargada con exito!');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
        $id = actividades::find($id);
        return view('varios.editaractividad', ['id' => $id]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(actividades $actividades)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //
        $datosActividades = request()->except(['_token', '_method']);
        actividades::where('id', '=', $id)->update($datosActividades);

        return redirect('/listaactividades')->with('success', 'Actividad cargada con exito!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(actividades $actividades)
    {
        //
    }
}
