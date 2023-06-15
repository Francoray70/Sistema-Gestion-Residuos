<?php

namespace App\Http\Controllers;

use App\Models\empresas;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EmpresasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //

        $recibirEmpresas['empresas'] = empresas::paginate(5);
        return view('usuarios.listaempresas', $recibirEmpresas);
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

        empresas::insert($datosEmpresa);
    }

    /**
     * Display the specified resource.
     */
    public function show(empresas $empresas)
    {
        //
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
    public function update(Request $request, empresas $empresas)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(empresas $empresas)
    {
        //
    }
}
