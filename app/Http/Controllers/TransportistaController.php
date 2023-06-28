<?php

namespace App\Http\Controllers;

use App\Models\Transportista;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TransportistaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
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
        Transportista::insert($datosTransporte);

        return view('transportistas.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Transportista $transportista)
    {
        //
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
    public function update(Request $request, Transportista $transportista)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Transportista $transportista)
    {
        //
    }
}
