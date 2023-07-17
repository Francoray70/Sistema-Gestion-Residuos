<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
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
        $user = Auth::user();
        $userEmpresa = $user->empresa;
        $transporte = Transportista::where('id_transp', 'LIKE', '%' . $userEmpresa . '%')->get();
        return view('transportistas.vehiculos', ['transporte' => $transporte]);
    }


    public function index()
    {
        //

        $user = Auth::user();
        $userEmpresa = $user->empresa;
        $userRol = $user->rol_id;

        if ($userRol == '6') {

            $vehiculos = vehiculos::all();
            return view('transportistas.listavehiculos', compact('vehiculos'));
        } else {
            $vehiculos = vehiculos::where('id_transp', 'LIKE', '%' . $userEmpresa . '%')->get();

            $comprobar = $vehiculos->count();

            if ($comprobar) {
                return view('transportistas.listavehiculos', compact('vehiculos'));
            } else {
                return redirect('/vehiculos');
            }
        }
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
    public function show($id)
    {
        //
        $id = vehiculos::find($id);
        return view('transportistas.editarvehiculo', ['id' => $id]);
    }

    public function showImg($id)
    {
        //
        $id2 = vehiculos::find($id);
        return view('transportistas.actualizarimagenesvehi', ['id' => $id2]);
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
    public function update(Request $request, $id)
    {
        //
        $datosCorrientes = request()->except(['_token', '_method']);
        vehiculos::where('id', '=', $id)->update($datosCorrientes);

        return redirect('/listavehiculos')->with('success_message', 'Empresa cargada con exito');
    }

    public function updateImg(Request $request, $id)
    {
        //
        $datosVehiculos = request()->except(['_token', '_method']);

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

        vehiculos::where('id', '=', $id)->update($datosVehiculos);

        return redirect('/listavehiculos')->with('success_message', 'Empresa cargada con exito');
    }
}
/**
 * Remove the specified resource from storage.
 */
