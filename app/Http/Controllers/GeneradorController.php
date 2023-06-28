<?php

namespace App\Http\Controllers;

use App\Models\generador;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;

class GeneradorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $registros = generador::all();
        return view('generadores.lista', ['registros' => $registros]);
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
    public function show(generador $empresas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(generador $empresas)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, generador $empresas)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(generador $empresas)
    {
        //
    }
}
