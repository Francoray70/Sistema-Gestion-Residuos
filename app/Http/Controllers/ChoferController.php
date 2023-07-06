<?php

namespace App\Http\Controllers;

use App\Models\Transportista;
use App\Models\chofer;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ChoferController extends Controller
{
    /**
     * Display a listing of the resource.
     */


    public function traerDatos()
    {
        //
        $transporte = Transportista::all();
        return view('transportistas.choferes', ['transporte' => $transporte]);
    }

    public function index()
    {
        //
        $datosChoferes = chofer::all();
        return view('transportistas.listachoferes', ['choferes' => $datosChoferes]);
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
        $datosChofer = request()->except('_token');

        if ($request->hasFile('nro_carnet_img')) {
            $datosChofer['nro_carnet_img'] = $request->file('nro_carnet_img')->store('chofer', 'public');
        }

        if ($request->hasFile('carga_pelig_img')) {
            $datosChofer['carga_pelig_img'] = $request->file('carga_pelig_img')->store('chofer', 'public');
        }

        if ($request->hasFile('sep_img')) {
            $datosChofer['sep_img'] = $request->file('sep_img')->store('chofer', 'public');
        }

        chofer::insert($datosChofer);

        return redirect('/listachoferes')->with('success_message', 'Empresa cargada con exito');
    }

    /**
     * Display the specified resource.
     */
    public function show(chofer $chofer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(chofer $chofer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, chofer $chofer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(chofer $chofer)
    {
        //
    }
}
