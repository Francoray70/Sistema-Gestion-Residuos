<?php

namespace App\Http\Controllers;

use App\Models\operadordf;
use App\Models\corrientes;
use App\Models\corrientesodf;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CorrientesodfController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function traerDatos()
    {
        $generador = operadordf::all();
        $corrientes = corrientes::all();

        return view('opdispfinal.corrientes', compact('generador', 'corrientes'));
    }

    public function traerDatosCantidades()
    {
        $generador = operadordf::all();

        return view('opdispfinal.corrientescant', ['generador' => $generador]);
    }

    public function resultadosCantidades(Request $request)
    {
        $generador = $request->input('id_operador_df');

        $resultados = corrientesodf::where('id_oper_df', $generador)
            ->get();

        $comprobar = $resultados->count();

        if ($comprobar) {
            return view('opdispfinal.listacantidadesanuales')->with('resultados', $resultados);
        } else {
            return view('sincontenido');
        }
    }

    public function index()
    {
        //
        $corrientes = corrientesodf::all();
        return view('opdispfinal.listacorrientes', ['corrientes' => $corrientes]);
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

        corrientesodf::insert($datosCorrientes);

        return redirect('/listacorrientesodf')->with('success_message', 'Corriente cargada con exito');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
        $corrientes = corrientes::all();
        $id = corrientesodf::find($id);
        return view('opdispfinal.editarcorriente', compact('id', 'corrientes'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(corrientesodf $corrientesodf)
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
        corrientesodf::where('id', '=', $id)->update($datosCorrientes);

        return redirect('/listacorrientesodf')->with('success_message', 'Empresa cargada con exito');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        corrientesodf::destroy($id);
        return redirect('/listacorrientesodf')->with('success_message', 'Corriente eliminada con exito');
    }
}
