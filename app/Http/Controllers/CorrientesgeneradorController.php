<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

use App\Models\generador;
use App\Models\corrientes;
use App\Models\corrientesgenerador;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CorrientesgeneradorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function traerDatos()
    {
        $user = Auth::user();
        $userEmpresa = $user->empresa;
        $generador = generador::where('nom_comp', 'LIKE', '%' . $userEmpresa . '%')->get();
        $corrientes = corrientes::all();

        return view('generadores.corrientes', compact('generador', 'corrientes'));
    }

    public function traerDatosCantidades()
    {
        $user = Auth::user();
        $userEmpresa = $user->empresa;
        $userRol = $user->rol_id;

        if ($userRol == '6') {

            $generador = generador::all();
            return view('generadores.corrientescant', compact('generador'));
        } else {

            $generador = generador::where('nom_comp', 'LIKE', '%' . $userEmpresa . '%')->get();

            return view('generadores.corrientescant', ['generador' => $generador]);
        }
    }

    public function resultadosCantidades(Request $request)
    {
        $generador = $request->input('nom_comp');

        $resultados = corrientesgenerador::where('generador', $generador)
            ->get();

        $comprobar = $resultados->count();

        $resultadosSumadoLt = corrientesgenerador::where('generador', $generador)
            ->where('um', '=', 'Lts')
            ->sum('cantidad');

        $resultadosSumadoKg = corrientesgenerador::where('generador', $generador)
            ->where('um', '=', 'KGs')
            ->sum('cantidad');

        if ($comprobar) {
            return view('generadores.listacantidadesanuales', compact('resultados', 'resultadosSumadoLt', 'resultadosSumadoKg', 'generador'));
        } else {
            return view('mensajes.sincorrientes');
        }
    }

    public function index()
    {
        //
        $user = Auth::user();
        $userEmpresa = $user->empresa;
        $userRol = $user->rol_id;

        if ($userRol == '6') {

            $corrientes = corrientesgenerador::all();
            return view('generadores.listacorrientes', compact('corrientes'));
        } else {
            $corrientes = corrientesgenerador::where('generador', 'LIKE', '%' . $userEmpresa . '%')->get();

            $comprobar = $corrientes->count();

            if ($comprobar) {
                return view('generadores.listacorrientes', compact('corrientes'));
            } else {
                return redirect('/corrientesgenerador');
            }
        }
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
