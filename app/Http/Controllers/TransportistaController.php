<?php

namespace App\Http\Controllers;

use App\Models\Empresas;
use App\Models\provincia;
use App\Models\Transportista;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TransportistaController extends Controller
{
    /**
     * Display a listing of the resource.
     */


    public function traerDatos()
    {
        //
        $empresas = Empresas::all();
        $provincias = provincia::orderBy('provincia')->get();
        return view('transportistas.index', compact('empresas', 'provincias'));
    }


    public function index()
    {
        //
        $registros = Transportista::all();
        return view('transportistas.listatransportes', ['registros' => $registros]);
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
        $datosTransporte = request()->except('_token');

        if ($request->hasFile('hab_mun_transp')) {
            $datosTransporte['hab_mun_transp'] = $request->file('hab_mun_transp')->store('transporte', 'public');
        }

        if ($request->hasFile('hab_pcia_transp')) {
            $datosTransporte['hab_pcia_transp'] = $request->file('hab_pcia_transp')->store('transporte', 'public');
        }

        if ($request->hasFile('hab_nac_transp')) {
            $datosTransporte['hab_nac_transp'] = $request->file('hab_nac_transp')->store('transporte', 'public');
        }

        Transportista::insert($datosTransporte);

        return redirect('/listatransportes');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
        $id = Transportista::find($id);
        return view('transportistas.editartransporte', ['id' => $id]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Transportista $transportista)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //
        $datosEmpresa = request()->except(['_token', '_method']);
        Transportista::where('id', '=', $id)->update($datosEmpresa);

        return redirect('/listatransportes')->with('success', 'Empresa cargada con exito');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Transportista $transportista)
    {
        //
    }
}
