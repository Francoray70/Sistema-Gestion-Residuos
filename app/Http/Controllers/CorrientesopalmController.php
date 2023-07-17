<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
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
        $user = Auth::user();
        $userEmpresa = $user->empresa;
        $generador = operadoralm::where('gener_nom', 'LIKE', '%' . $userEmpresa . '%')->get();
        $corrientes = corrientes::all();

        return view('opalmacenamiento.corrientes', compact('generador', 'corrientes'));
    }

    public function traerDatosCantidades()
    {
        $user = Auth::user();
        $userEmpresa = $user->empresa;
        $userRol = $user->rol_id;

        if ($userRol == '6') {

            $generador = operadoralm::all();
            return view('opalmacenamiento.corientescantidad', compact('generador'));
        } else {

            $generador = operadoralm::where('gener_nom', 'LIKE', '%' . $userEmpresa . '%')->get();

            return view('opalmacenamiento.corientescantidad', ['generador' => $generador]);
        }
    }

    public function resultadosCantidades(Request $request)
    {
        $generador = $request->input('gener_nom');

        $resultados = corrientesopalm::where('id_generador', $generador)
            ->get();

        $comprobar = $resultados->count();

        $resultadosSumadoLt = corrientesopalm::where('id_generador', $generador)
            ->where('um', '=', 'Lts')
            ->sum('cantidad');

        $resultadosSumadoKg = corrientesopalm::where('id_generador', $generador)
            ->where('um', '=', 'KGs')
            ->sum('cantidad');

        if ($comprobar) {
            return view('opalmacenamiento.listacantidadesanuales', compact('resultados', 'resultadosSumadoLt', 'resultadosSumadoKg', 'generador'));
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

            $corrientes = corrientesopalm::all();
            return view('opalmacenamiento.listacorrientes', compact('corrientes'));
        } else {
            $corrientes = corrientesopalm::where('id_generador', 'LIKE', '%' . $userEmpresa . '%')->get();

            $comprobar = $corrientes->count();

            if ($comprobar) {
                return view('opalmacenamiento.listacorrientes', compact('corrientes'));
            } else {
                return redirect('/corrientesopalmacenamiento');
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
