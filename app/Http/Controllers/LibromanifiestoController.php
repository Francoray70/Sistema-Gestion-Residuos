<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

use App\Models\manifiesto;
use App\Models\certificado;
use App\Models\generador;
use App\Models\Transportista;
use App\Models\operadoralm;
use App\Models\operadordf;
use App\Models\libromanifiesto;
use App\Http\Controllers\Controller;
use App\Models\Empresas;
use Illuminate\Http\Request;

class LibromanifiestoController extends Controller
{
    /**
     * Display a listing of the resource.
     */


    public function traerDatos()
    {
        //
        $user = Auth::user();
        $userEmpresa = $user->empresa;
        $userRol = $user->rol_id;

        if ($userRol == '6') {

            $generador = generador::orderBy('nom_comp')->get();
            return view('generadores.manifiestos', compact('generador'));
        } else {

            $generador = generador::where('nom_comp', 'LIKE', '%' . $userEmpresa . '%')->get();

            return view('generadores.manifiestos', ['generador' => $generador]);
        }
    }

    public function traerDatosTransporte()
    {
        //

        $user = Auth::user();
        $userEmpresa = $user->empresa;
        $userRol = $user->rol_id;

        if ($userRol == '6') {

            $transporte = Transportista::orderBy('id_transp')->get();
            return view('transportistas.manifiestos', compact('transporte'));
        } else {

            $transporte = Transportista::where('id_transp', 'LIKE', '%' . $userEmpresa . '%')->get();

            return view('transportistas.manifiestos', ['transporte' => $transporte]);
        }
    }

    public function traerDatosOpalm()
    {
        //

        $user = Auth::user();
        $userEmpresa = $user->empresa;
        $userRol = $user->rol_id;

        if ($userRol == '6') {

            $operador = operadoralm::orderBy('gener_nom')->get();
            return view('opalmacenamiento.manifiestos', compact('operador'));
        } else {

            $operador = operadoralm::where('gener_nom', 'LIKE', '%' . $userEmpresa . '%')->get();

            return view('opalmacenamiento.manifiestos', ['operador' => $operador]);
        }
    }

    public function traerDatosRpgAlm()
    {
        //

        $user = Auth::user();
        $userEmpresa = $user->empresa;
        $userRol = $user->rol_id;

        if ($userRol == '6') {

            $operador = operadoralm::orderBy('gener_nom')->get();
            return view('opalmacenamiento.rpg', compact('operador'));
        } else {

            $operador = operadoralm::where('gener_nom', 'LIKE', '%' . $userEmpresa . '%')->get();

            return view('opalmacenamiento.rpg', ['operador' => $operador]);
        }
    }

    public function traerDatosOdf()
    {
        //
        $user = Auth::user();
        $userEmpresa = $user->empresa;
        $userRol = $user->rol_id;

        if ($userRol == '6') {

            $operador = operadordf::orderBy('id_operador_df')->get();
            return view('opdispfinal.manifiestos', compact('operador'));
        } else {

            $operador = operadordf::where('id_operador_df', 'LIKE', '%' . $userEmpresa . '%')->get();

            return view('opdispfinal.manifiestos', ['operador' => $operador]);
        }
    }

    public function traerDatosCertifOdf()
    {
        //
        $user = Auth::user();
        $userEmpresa = $user->empresa;
        $userRol = $user->rol_id;

        if ($userRol == '6') {

            $operador = operadordf::orderBy('id_operador_df')->get();
            return view('opdispfinal.certificados', compact('operador'));
        } else {

            $operador = operadordf::where('id_operador_df', 'LIKE', '%' . $userEmpresa . '%')->get();

            return view('opdispfinal.certificados', ['operador' => $operador]);
        }
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
        $user = Auth::user();
        $userEmpresa = $user->empresa;

        $verificarPago = Empresas::where('nombre', 'LIKE', '%' . $userEmpresa . '%')
            ->where('pago', '=', 'SI')
            ->get();

        $verificar = $verificarPago->count();

        if ($verificar) {
            $generador = $request->input('nom_comp');
            $fechaInicio = $request->input('fecha_inicio');
            $fechaFinal = $request->input('fecha_fin');

            $resultados = manifiesto::where('nom_comp', 'LIKE', '%' . $generador . '%')
                ->whereBetween('fecha_alta_manif', [$fechaInicio, $fechaFinal])
                ->orderBy('id_manifiesto')
                ->get();

            $comprobar = $resultados->count();

            if ($comprobar) {
                return view('generadores.listadomanifiesto', compact('resultados', 'generador', 'fechaInicio', 'fechaFinal'));
            } else {
                return view('mensajes.sincontenido');
            }
        } else {
            return view('mensajes.nopago');
        }
    }


    public function resultadosTransporte(Request $request)
    {
        $user = Auth::user();
        $userEmpresa = $user->empresa;

        $verificarPago = Empresas::where('nombre', 'LIKE', '%' . $userEmpresa . '%')
            ->where('pago', '=', 'SI')
            ->get();

        $verificar = $verificarPago->count();

        if ($verificar) {

            $transporte = $request->input('id_transp');
            $fechaInicio = $request->input('fecha_inicio');
            $fechaFinal = $request->input('fecha_fin');

            $resultados = manifiesto::where('id_transp', 'LIKE', '%' . $transporte . '%')
                ->whereBetween('fecha_alta_manif', [$fechaInicio, $fechaFinal])
                ->orderBy('id_manifiesto')
                ->get();

            $comprobar = $resultados->count();

            if ($comprobar) {
                return view('transportistas.listadomanifiesto', compact('resultados', 'transporte', 'fechaInicio', 'fechaFinal'));
            } else {
                return view('mensajes.sincontenido');
            }
        } else {
            return view('mensajes.nopago');
        }
    }

    public function resultadosTransporteindividual(Request $request)
    {
        $user = Auth::user();
        $userEmpresa = $user->empresa;

        $verificarPago = Empresas::where('nombre', 'LIKE', '%' . $userEmpresa . '%')
            ->where('pago', '=', 'SI')
            ->get();

        $verificar = $verificarPago->count();

        if ($verificar) {

            $userRol = $user->rol_id;
            $numero = $request->input('numero_manifiesto');

            if ($userRol == '6') {

                $resultados = manifiesto::where('id_manifiesto', '=', $numero)->get();
                $comprobar = $resultados->count();

                if ($comprobar) {
                    return view('transportistas.manifencontrado')->with('resultados', $resultados);
                } else {
                    return view('mensajes.sincontenido');
                }
            } else {

                $resultados = manifiesto::where('id_manifiesto', '=', $numero)
                    ->where('id_transp', 'LIKE', '%' . $userEmpresa . '%')
                    ->get();
                $comprobar = $resultados->count();

                if ($comprobar) {
                    return view('transportistas.manifencontrado')->with('resultados', $resultados);
                } else {
                    return view('mensajes.sincontenido');
                }
            }
        } else {
            return view('mensajes.nopago');
        }
    }


    public function resultadosOpalm(Request $request)
    {
        $user = Auth::user();
        $userEmpresa = $user->empresa;

        $verificarPago = Empresas::where('nombre', 'LIKE', '%' . $userEmpresa . '%')
            ->where('pago', '=', 'SI')
            ->get();

        $verificar = $verificarPago->count();

        if ($verificar) {

            $operador = $request->input('gener_nom');
            $fechaInicio = $request->input('fecha_inicio');
            $fechaFinal = $request->input('fecha_fin');

            $resultados = manifiesto::where('gener_nom', 'LIKE', '%' . $operador . '%')
                ->whereBetween('fecha_alta_manif', [$fechaInicio, $fechaFinal])
                ->where('estadoo', '<>', 'INICIADO')
                ->orderBy('id_manifiesto')
                ->get();

            $comprobar = $resultados->count();

            if ($comprobar) {
                return view('opalmacenamiento.listadomanifiesto', compact('resultados', 'operador', 'fechaInicio', 'fechaFinal'));
            } else {
                return view('mensajes.sincontenido');
            }
        } else {
            return view('mensajes.nopago');
        }
    }


    public function resultadosRpgAlm(Request $request)
    {
        $user = Auth::user();
        $userEmpresa = $user->empresa;

        $verificarPago = Empresas::where('nombre', 'LIKE', '%' . $userEmpresa . '%')
            ->where('pago', '=', 'SI')
            ->get();

        $verificar = $verificarPago->count();

        if ($verificar) {

            $operador = $request->input('operador');
            $fechaInicio = $request->input('fecha_inicio');
            $fechaFinal = $request->input('fecha_fin');

            $resultados = manifiesto::where('gener_nom', 'LIKE', '%' . $operador . '%')
                ->whereBetween('fecha_alta_manif', [$fechaInicio, $fechaFinal])
                ->get();

            $comprobar = $resultados->count();

            if ($comprobar) {
                return view('opalmacenamiento.listadorpg', compact('resultados', 'operador', 'fechaInicio', 'fechaFinal'));
            } else {
                return view('mensajes.sincontenido');
            }
        } else {
            return view('mensajes.nopago');
        }
    }


    public function resultadosOdf(Request $request)
    {
        $user = Auth::user();
        $userEmpresa = $user->empresa;

        $verificarPago = Empresas::where('nombre', 'LIKE', '%' . $userEmpresa . '%')
            ->where('pago', '=', 'SI')
            ->get();

        $verificar = $verificarPago->count();

        if ($verificar) {

            $operador = $request->input('operador');
            $fechaInicio = $request->input('fecha_inicio');
            $fechaFinal = $request->input('fecha_fin');

            $resultados = manifiesto::where('gener_nom', 'LIKE', '%' . $operador . '%')
                ->whereBetween('fecha_alta_manif', [$fechaInicio, $fechaFinal])
                ->where('estadoo', '<>', 'INICIADO')
                ->orderBy('id_manifiesto')
                ->get();

            $comprobar = $resultados->count();

            if ($comprobar) {
                return view('opdispfinal.listadomanifiestos', compact('resultados', 'operador', 'fechaInicio', 'fechaFinal'));
            } else {
                return view('mensajes.sincontenido');
            }
        } else {
            return view('mensajes.nopago');
        }
    }

    public function resultadosCertifOdf(Request $request)
    {
        $user = Auth::user();
        $userEmpresa = $user->empresa;

        $verificarPago = Empresas::where('nombre', 'LIKE', '%' . $userEmpresa . '%')
            ->where('pago', '=', 'SI')
            ->get();

        $verificar = $verificarPago->count();

        if ($verificar) {

            $operador = $request->input('operador');
            $fechaInicio = $request->input('fecha_inicio');
            $fechaFinal = $request->input('fecha_fin');

            $resultados = certificado::where('opdfinal', 'LIKE', '%' . $operador . '%')
                ->whereBetween('fechacertificado', [$fechaInicio, $fechaFinal])
                ->get();

            $comprobar = $resultados->count();

            if ($comprobar) {
                return view('opdispfinal.listadocertificados', compact('resultados', 'operador', 'fechaInicio', 'fechaFinal'));
            } else {
                return view('mensajes.sincontenido');
            }
        } else {
            return view('mensajes.nopago');
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
