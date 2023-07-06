<?php

namespace App\Http\Controllers;

use App\Models\provincia;
use App\Models\empresas;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;

class EmpresasController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function traerDatos()
    {
        //
        $provincias = provincia::orderBy('provincia')->get();
        return view('usuarios.empresas', ['provincias' => $provincias]);
    }

    public function index()
    {
        //
        $registros = Empresas::all();
        return view('usuarios.listaempresas', ['registros' => $registros]);
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

        Empresas::insert($datosEmpresa);

        return redirect('/listaempresas')->with('success', 'Empresa cargada con exito');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
        $id = Empresas::find($id);
        return view('usuarios.editarempresa', ['id' => $id]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(empresas $empresas)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //
        $datosEmpresa = request()->except(['_token', '_method', 'fecha_alta', 'pago', 'altauser']);
        Empresas::where('id', '=', $id)->update($datosEmpresa);

        return redirect('/listaempresas')->with('success', 'Empresa cargada con exito');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(empresas $empresas)
    {
        //
    }
}
