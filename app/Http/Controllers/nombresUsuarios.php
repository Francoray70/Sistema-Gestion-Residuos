<?php

namespace App\Http\Controllers;

use App\Models\cr;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class nombresUsuarios extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $registros = cr::all();
        return view('usuarios.listausuarios', ['registros' => $registros]);
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
        $id = cr::find($id);
        return view('usuarios.editarusuario', ['id' => $id]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(cr $cr)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //
        $datosUsuarios = request()->except(['_token', '_method', 'password']);
        cr::where('id', '=', $id)->update($datosUsuarios);

        return redirect('/listausuarios')->with('success', 'Empresa cargada con exito');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(cr $cr)
    {
        //
    }
}
