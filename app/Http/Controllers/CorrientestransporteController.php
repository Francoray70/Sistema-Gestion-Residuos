<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

use App\Models\Transportista;
use App\Models\corrientes;
use App\Models\corrientestransporte;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CorrientestransporteController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function traerDatos()
    {
        $user = Auth::user();
        $userEmpresa = $user->empresa;
        $transporte = Transportista::where('id_transp', 'LIKE', '%' . $userEmpresa . '%')->get();
        $corrientes = corrientes::all();

        return view('transportistas.corrientes', compact('transporte', 'corrientes'));
    }


    public function index()
    {
        //

        $user = Auth::user();
        $userEmpresa = $user->empresa;
        $userRol = $user->rol_id;

        if ($userRol == '6') {

            $corrientes = corrientestransporte::all();
            return view('transportistas.listacorrientes', compact('corrientes'));
        } else {
            $corrientes = corrientestransporte::where('id_transp', 'LIKE', '%' . $userEmpresa . '%')->get();

            $comprobar = $corrientes->count();

            if ($comprobar) {
                return view('transportistas.listacorrientes', compact('corrientes'));
            } else {
                return redirect('/corrientestransporte');
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
        $datosCorrientes = request()->except('_token');

        corrientestransporte::insert($datosCorrientes);

        return redirect('/listacorrientestransportes')->with('success_message', 'Corriente cargada con exito');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
        $corrientes = corrientes::all();
        $id = corrientestransporte::find($id);
        return view('transportistas.editarcorriente', compact('id', 'corrientes'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(corrientestransporte $corrientestransporte)
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
        corrientestransporte::where('id', '=', $id)->update($datosCorrientes);

        return redirect('/listacorrientestransportes')->with('success_message', 'Empresa cargada con exito');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        corrientestransporte::destroy($id);
        return redirect('/listacorrientestransportes')->with('success_message', 'Corriente eliminada con exito');
    }
}
