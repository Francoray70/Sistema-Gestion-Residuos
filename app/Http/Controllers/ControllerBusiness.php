<?php

namespace App\Http\Controllers;

use App\Models\empresas;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\DB;

class ControllerBusiness extends Controller
{
    /**
     * Display a listing of the resource.
     * FUNCTION PARA BUSCAR EN TRANSPORTISTAS
     */
    public function index()
    {
        //
        $data = Empresas::orderBy('nombre')->get();
        return view('generadores.index', ['empresas' => $data]);
    }

    /**
     * FUNCTION PARA BUSCAR EN GENERADORES
     */
    public function index2()
    {
        //
        $data = Empresas::orderBy('nombre')->get();
        return view('transportistas.index', ['empresas' => $data]);
    }

    /**
     * FUNCTION PARA BUSCAR EN OP ALMACENAMIENTO
     */
    public function index3()
    {
        //
        $data = Empresas::orderBy('nombre')->get();
        return view('opalmacenamiento.index', ['empresas' => $data]);
    }

    /**
     * FUNCTION PARA BUSCAR EN OP DISP FINAL
     */
    public function index4()
    {
        //
        $data = Empresas::orderBy('nombre')->get();
        return view('opdispfinal.index', ['empresas' => $data]);
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
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
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
    public function update(Request $request, $id)
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
