<?php

namespace App\Http\Controllers;

use App\Models\actividades;
use App\Models\provincia;
use App\Models\empresas;
use App\Models\generador;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;

class GeneradorController extends Controller
{

    public function traerDatos()
    {
        $datosProvincia = provincia::orderBy('provincia')->get();
        $datosEmpresa = Empresas::orderBy('nombre')->get();
        $datosActividades = actividades::all();

        return view('generadores.index', compact('datosProvincia', 'datosEmpresa', 'datosActividades'));
    }
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
    public function mostrarImagen($id)
    {
        $imagen = generador::find($id);

        if (!$imagen) {
            abort(404);
        }

        return response()->make($imagen->contenido, 200, [
            'Content-Type' => $imagen->mime_type,
            'Content-Disposition' => 'inline; filename="' . $imagen->nombre . '"'
        ]);
    }


    /**
     * Store a newly created resource in storage.
     */

    public function store(Request $request)
    {
        //

        $datosEmpresa = request()->except('_token');

        if ($request->hasFile('cli_ima_hab_pro')) {
            $datosEmpresa['cli_ima_hab_pro'] = $request->file('cli_ima_hab_pro')->store('generadores', 'public');
        }

        if ($request->hasFile('cli_ima_hab_mun')) {
            $datosEmpresa['cli_ima_hab_mun'] = $request->file('cli_ima_hab_mun')->store('generadores', 'public');
        }

        if ($request->hasFile('cli_ima_hab_com')) {
            $datosEmpresa['cli_ima_hab_com'] = $request->file('cli_ima_hab_com')->store('generadores', 'public');
        }

        generador::insert($datosEmpresa);

        return redirect('/listagenerador')->with('success_message', 'Empresa cargada con exito');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
        $id2 = generador::find($id);
        return view('generadores.editargenerador', ['id' => $id2]);
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
    public function update(Request $request, $id)
    {
        //
        $datosGenerador = request()->except(['_token', '_method']);
        generador::where('id', '=', $id)->update($datosGenerador);

        return redirect('/listagenerador')->with('success_message', 'Empresa cargada con exito');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(generador $empresas)
    {
        //
    }
}
