<?php

namespace App\Http\Controllers;

use App\Models\generador;
use App\Models\corrientes;
use App\Models\corrientesgenerador;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CorrientesgeneradorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function traerDatos()
    {
        $generador = generador::all();
        $corrientes = corrientes::all();

        return view('generadores.corrientes', compact('generador', 'corrientes'));
    }

    public function traerDatosCantidades()
    {
        $generador = generador::all();

        return view('generadores.corrientescant', ['generador' => $generador]);
    }

    public function resultadosCantidades(Request $request)
    {
        $generador = $request->input('nom_comp');

        $resultados = corrientesgenerador::where('generador', $generador)
            ->get();

        $comprobar = $resultados->count();

        if ($comprobar) {
            return view('generadores.listacantidadesanuales')->with('resultados', $resultados);
        } else {
            return view('sincontenido');
        }
    }

    public function index()
    {
        //
        $corrientes = corrientesgenerador::all();
        return view('generadores.listacorrientes', ['corrientes' => $corrientes]);
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
        $datosCorrientes = request()->except('_token');

        corrientesgenerador::insert($datosCorrientes);

        return redirect('/listacorrientesgeneradores')->with('success_message', 'Corriente cargada con exito');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
        $corrientes = corrientes::all();
        $id = corrientesgenerador::find($id);
        return view('generadores.editarcorriente', compact('corrientes', 'id'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(corrientesgenerador $corrientesgenerador)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,  $id)
    {
        //
        $datosGenerador = request()->except(['_token', '_method']);
        corrientesgenerador::where('id', '=', $id)->update($datosGenerador);

        return redirect('/listacorrientesgeneradores')->with('success_message', 'Corriente cargada con exito');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        corrientesgenerador::destroy($id);
        return redirect('/listacorrientesgeneradores')->with('success_message', 'Corriente eliminada con exito');
    }
}
