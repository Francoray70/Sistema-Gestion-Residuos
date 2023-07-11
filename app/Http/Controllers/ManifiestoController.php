<?php

namespace App\Http\Controllers;

use App\Models\generador;
use App\Models\Transportista;
use App\Models\manifiestodet;
use App\Models\manifiesto;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ManifiestoController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function traerDatos()
    {
        //
        $transportes = Transportista::all();
        $generador = generador::all();

        return view('transportistas.generarmanif', compact('transportes', 'generador'));
    }

    public function index()
    {
        //
        $manifiesto = manifiesto::all();

        return view('transportistas.listacabeceras', ['manifiesto' => $manifiesto]);
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
    public function store($id)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(manifiesto $manifiesto)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(manifiesto $manifiesto)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, manifiesto $manifiesto)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(manifiesto $manifiesto)
    {
        //
    }
}
