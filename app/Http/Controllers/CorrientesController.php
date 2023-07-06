<?php

namespace App\Http\Controllers;

use App\Models\corrientes;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CorrientesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $corrientes = corrientes::all();
        return view('varios.listacorrientes', ['corrientes' => $corrientes]);
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
        $corrientes = request()->except('_token');

        corrientes::insert($corrientes);

        return redirect('/listacorrientes')->with('success', 'Actividad cargada con exito!');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
        $id = corrientes::find($id);
        return view('varios.editarcorriente', ['id' => $id]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(corrientes $corrientes)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //
        $datosCorriente = request()->except(['_token', '_method']);
        corrientes::where('id', '=', $id)->update($datosCorriente);

        return redirect('/listacorrientes')->with('success', 'Actividad cargada con exito!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(corrientes $corrientes)
    {
        //
    }
}
