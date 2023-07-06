<?php

namespace App\Http\Controllers;

use App\Models\Empresas;
use App\Models\provincia;
use App\Models\operadordf;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OperadordfController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function traerDatos()
    {
        //
        $provincias = provincia::orderBy('provincia')->get();
        $empresas = Empresas::all();
        return view('opdispfinal.index', compact('provincias', 'empresas'));
    }


    public function index()
    {
        //
        $operadores = operadordf::all();
        return view('opdispfinal.listaodf', ['operadores' => $operadores]);
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
        $datosEmpresa = request()->except('_token');

        if ($request->hasFile('hab_mun_odf')) {
            $datosEmpresa['hab_mun_odf'] = $request->file('hab_mun_odf')->store('operadorpordf', 'public');
        }

        if ($request->hasFile('hab_pro_odf')) {
            $datosEmpresa['hab_pro_odf'] = $request->file('hab_pro_odf')->store('operadorpordf', 'public');
        }

        if ($request->hasFile('habil_nacion')) {
            $datosEmpresa['habil_nacion'] = $request->file('habil_nacion')->store('operadorpordf', 'public');
        }
        operadordf::insert($datosEmpresa);

        return redirect('/listaodf')->with('success_message', 'Empresa cargada con exito');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
        $id = operadordf::find($id);
        return view('opdispfinal.editaroperador', ['id' => $id]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(operadordf $operadordf)
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
        operadordf::where('id', '=', $id)->update($datosEmpresa);

        return redirect('/listaodf')->with('success_message', 'Empresa cargada con exito');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(operadordf $operadordf)
    {
        //
    }
}
