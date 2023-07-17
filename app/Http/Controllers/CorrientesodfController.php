<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

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
        $user = Auth::user();
        $userEmpresa = $user->empresa;
        $generador = operadordf::where('id_operador_df', 'LIKE', '%' . $userEmpresa . '%')->get();
        $corrientes = corrientes::all();

        return view('opdispfinal.corrientes', compact('generador', 'corrientes'));
    }

    public function traerDatosCantidades()
    {
        $user = Auth::user();
        $userEmpresa = $user->empresa;
        $userRol = $user->rol_id;

        if ($userRol == '6') {

            $generador = operadordf::all();
            return view('opdispfinal.corrientescant', compact('generador'));
        } else {

            $generador = operadordf::where('id_operador_df', 'LIKE', '%' . $userEmpresa . '%')->get();

            return view('opdispfinal.corrientescant', ['generador' => $generador]);
        }
    }

    public function resultadosCantidades(Request $request)
    {
        $generador = $request->input('id_operador_df');

        $resultados = corrientesodf::where('id_oper_df', $generador)
            ->get();

        $comprobar = $resultados->count();

        $resultadosSumadoLt = corrientesodf::where('id_oper_df', $generador)
            ->where('um', '=', 'Lts')
            ->sum('cantidad');

        $resultadosSumadoKg = corrientesodf::where('id_oper_df', $generador)
            ->where('um', '=', 'KGs')
            ->sum('cantidad');

        if ($comprobar) {
            return view('opdispfinal.listacantidadesanuales', compact('resultados', 'resultadosSumadoLt', 'resultadosSumadoKg', 'generador'));
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

            $corrientes = corrientesodf::all();
            return view('opdispfinal.listacorrientes', compact('corrientes'));
        } else {
            $corrientes = corrientesodf::where('id_oper_df', 'LIKE', '%' . $userEmpresa . '%')->get();

            $comprobar = $corrientes->count();

            if ($comprobar) {
                return view('opdispfinal.listacorrientes', compact('corrientes'));
            } else {
                return redirect('/corrientesopdispfinal');
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
