<?php

namespace App\Http\Controllers;

use App\Models\provincia;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\DB;

class ProvinciasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $provincias = provincia::orderBy('provincia')->get();

        return view('generadores.index', ['provincias' => $provincias]);
    }

    public function index2()
    {
        //
        $provincias = provincia::orderBy('provincia')->get();

        return view('usuarios.empresas', ['provincias' => $provincias]);
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
    public function show(ProvinciasController $rc)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ProvinciasController $rc)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ProvinciasController $rc)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ProvinciasController $rc)
    {
        //
    }
}
