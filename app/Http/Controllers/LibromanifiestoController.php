<?php

namespace App\Http\Controllers;

use App\Models\manifiesto;
use App\Models\certificado;
use App\Models\generador;
use App\Models\Transportista;
use App\Models\operadoralm;
use App\Models\operadordf;
use App\Models\libromanifiesto;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Collection;

class LibromanifiestoController extends Controller
{
    /**
     * Display a listing of the resource.
     */


    public function traerDatos()
    {
        //
        $generador = generador::orderBy('nom_comp')->get();

        return view('generadores.manifiestos', ['generador' => $generador]);
    }

    public function traerDatosTransporte()
    {
        //
        $transporte = Transportista::orderBy('id_transp')->get();

        return view('transportistas.manifiestos', ['transporte' => $transporte]);
    }

    public function traerDatosOpalm()
    {
        //
        $Operadoralm = operadoralm::orderBy('gener_nom')->get();

        return view('opalmacenamiento.manifiestos', ['operador' => $Operadoralm]);
    }

    public function traerDatosRpgAlm()
    {
        //
        $Operadoralm = operadoralm::orderBy('gener_nom')->get();

        return view('opalmacenamiento.rpg', ['operador' => $Operadoralm]);
    }

    public function traerDatosOdf()
    {
        //
        $Operadorodf = operadordf::orderBy('id_operador_df')->get();

        return view('opdispfinal.manifiestos', ['operador' => $Operadorodf]);
    }

    public function traerDatosCertifOdf()
    {
        //
        $Operadorodf = operadordf::orderBy('id_operador_df')->get();

        return view('opdispfinal.certificados', ['operador' => $Operadorodf]);
    }

    public function index()
    {
        //
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

    public function resultados(Request $request)
    {
        $generador = $request->input('nom_comp');
        $fechaInicio = $request->input('fecha_inicio');
        $fechaFinal = $request->input('fecha_fin');

        $resultados = manifiesto::where('nom_comp', $generador)
            ->whereBetween('fecha_alta_manif', [$fechaInicio, $fechaFinal])
            ->orderBy('id_manifiesto')
            ->get();

        $comprobar = $resultados->count();

        if ($comprobar) {
            return view('generadores.listadomanifiesto')->with('resultados', $resultados);
        } else {
            return view('sincontenido');
        }
    }


    public function resultadosTransporte(Request $request)
    {
        $transporte = $request->input('id_transp');
        $fechaInicio = $request->input('fecha_inicio');
        $fechaFinal = $request->input('fecha_fin');

        $resultados = manifiesto::where('id_transp', $transporte)
            ->whereBetween('fecha_alta_manif', [$fechaInicio, $fechaFinal])
            ->orderBy('id_manifiesto')
            ->get();

        $comprobar = $resultados->count();

        if ($comprobar) {
            return view('transportistas.listadomanifiesto')->with('resultados', $resultados);
        } else {
            return view('sincontenido');
        }
    }

    public function resultadosTransporteindividual(Request $request)
    {
        $numero = $request->input('numero_manifiesto');

        $resultados = manifiesto::where('id_manifiesto', $numero)->get();

        $comprobar = $resultados->count();

        if ($comprobar) {
            return view('transportistas.manifencontrado')->with('resultados', $resultados);
        } else {
            return view('sincontenido');
        }
    }


    public function resultadosOpalm(Request $request)
    {
        $operador = $request->input('gener_nom');
        $fechaInicio = $request->input('fecha_inicio');
        $fechaFinal = $request->input('fecha_fin');

        $resultados = manifiesto::where('gener_nom', $operador)
            ->whereBetween('fecha_alta_manif', [$fechaInicio, $fechaFinal])
            ->where('estadoo', '<>', 'INICIADO')
            ->orderBy('id_manifiesto')
            ->get();

        $comprobar = $resultados->count();

        if ($comprobar) {
            return view('opalmacenamiento.listadomanifiesto')->with('resultados', $resultados);
        } else {
            return view('sincontenido');
        }
    }


    public function resultadosRpgAlm(Request $request)
    {
        $operador = $request->input('operador');
        $fechaInicio = $request->input('fecha_inicio');
        $fechaFinal = $request->input('fecha_fin');

        $resultados = manifiesto::where('gener_nom', $operador)
            ->whereBetween('fecha_alta_manif', [$fechaInicio, $fechaFinal])
            ->where('rpg', '<>', '')
            ->orderBy('id_manifiesto')
            ->get();

        $comprobar = $resultados->count();

        if ($comprobar) {
            return view('opalmacenamiento.listadorpg')->with('resultados', $resultados);
        } else {
            return view('sincontenido');
        }
    }


    public function resultadosOdf(Request $request)
    {
        $operador = $request->input('operador');
        $fechaInicio = $request->input('fecha_inicio');
        $fechaFinal = $request->input('fecha_fin');

        $resultados = manifiesto::where('gener_nom', $operador)
            ->whereBetween('fecha_alta_manif', [$fechaInicio, $fechaFinal])
            ->where('estadoo', '<>', 'INICIADO')
            ->orderBy('id_manifiesto')
            ->get();

        $comprobar = $resultados->count();

        if ($comprobar) {
            return view('opdispfinal.listadomanifiestos')->with('resultados', $resultados);
        } else {
            return view('sincontenido');
        }
    }

    public function resultadosCertifOdf(Request $request)
    {
        $operador = $request->input('operador');
        $fechaInicio = $request->input('fecha_inicio');
        $fechaFinal = $request->input('fecha_fin');

        $resultados = certificado::where('opdfinal', $operador)
            ->whereBetween('fechacertificado', [$fechaInicio, $fechaFinal])
            ->get();

        $comprobar = $resultados->count();

        if ($comprobar) {
            return view('opdispfinal.listadocertificados')->with('resultados', $resultados);
        } else {
            return view('sincontenido');
        }
    }

    public function store($generador)
    {
        //

    }

    /**
     * Display the specified resource.
     */
    public function show($generador)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(libromanifiesto $libromanifiesto)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, libromanifiesto $libromanifiesto)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(libromanifiesto $libromanifiesto)
    {
        //
    }
}
