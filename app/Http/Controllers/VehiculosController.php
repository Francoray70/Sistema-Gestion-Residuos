<?php

namespace App\Http\Controllers;

use App\Models\Transportista;
use App\Models\vehiculos;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class VehiculosController extends Controller
{
    /**
     * Display a listing of the resource.
     */



    public function traerDatos()
    {
        //
        $transporte = Transportista::all();
        return view('transportistas.vehiculos', ['transporte' => $transporte]);
    }


    public function index()
    {
        //
        $datosVehiculos = vehiculos::all();
        return view('transportistas.listavehiculos', ['vehiculos' => $datosVehiculos]);
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
        $datosVehiculos = request()->except('_token');

        if ($request->hasFile('pat_rut')) {
            $datosVehiculos['pat_rut'] = $request->file('pat_rut')->store('vehiculos', 'public');
        }

        if ($request->hasFile('pat_tit')) {
            $datosVehiculos['pat_tit'] = $request->file('pat_tit')->store('vehiculos', 'public');
        }

        if ($request->hasFile('pat_ced_verde')) {
            $datosVehiculos['pat_ced_verde'] = $request->file('pat_ced_verde')->store('vehiculos', 'public');
        }

        if ($request->hasFile('pat_vtv_img')) {
            $datosVehiculos['pat_vtv_img'] = $request->file('pat_vtv_img')->store('vehiculos', 'public');
        }

        if ($request->hasFile('pat_cpel_img')) {
            $datosVehiculos['pat_cpel_img'] = $request->file('pat_cpel_img')->store('vehiculos', 'public');
        }

        vehiculos::insert($datosVehiculos);

        return redirect('/listavehiculos')->with('success_message', 'Empresa cargada con exito');
    }

    /**
     * Display the specified resource.
     */
    public function show(vehiculos $vehiculos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(vehiculos $vehiculos)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, vehiculos $vehiculos)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(vehiculos $vehiculos)
    {
        //
    }
}
