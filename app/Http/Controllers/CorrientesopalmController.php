<?php

namespace App\Http\Controllers;

use App\Models\operadoralm;
use App\Models\corrientes;
use App\Models\corrientesopalm;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CorrientesopalmController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function traerDatos()
    {
        $generador = operadoralm::all();
        $corrientes = corrientes::all();

        return view('opalmacenamiento.corrientes', compact('generador', 'corrientes'));
    }

    public function traerDatosCantidades()
    {
        $generador = operadoralm::all();

        return view('opalmacenamiento.corientescantidad', ['generador' => $generador]);
    }

    public function resultadosCantidades(Request $request)
    {
        $generador = $request->input('gener_nom');

        $resultados = corrientesopalm::where('id_generador', $generador)
            ->get();

        $comprobar = $resultados->count();

        if ($comprobar) {
            return view('opalmacenamiento.listacantidadesanuales')->with('resultados', $resultados);
        } else {
            return view('sincontenido');
        }
    }

    public function index()
    {
        //
        $corrientes = corrientesopalm::all();
        return view('opalmacenamiento.listacorrientes', ['corrientes' => $corrientes]);
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

        corrientesopalm::insert($datosCorrientes);

        return redirect('/listacorrientesopalm')->with('success_message', 'Corriente cargada con exito');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
        $corrientes = corrientes::all();
        $id = corrientesopalm::find($id);
        return view('opalmacenamiento.editarcorriente', compact('id', 'corrientes'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(corrientesopalm $corrientesopalm)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //
        $datosCorrientes = request()->except(['_token', '_method']);
        corrientesopalm::where('id', '=', $id)->update($datosCorrientes);

        return redirect('/listacorrientesopalm')->with('success_message', 'Empresa cargada con exito');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        corrientesopalm::destroy($id);
        return redirect('/listacorrientesopalm')->with('success_message', 'Corriente eliminada con exito');
    }
}
