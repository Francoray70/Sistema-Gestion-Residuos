<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

use App\Models\certificado;
use App\Models\manifiesto;
use App\Models\manifiestodet;
use App\Models\operadoralm;
use App\Models\operadordf;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CertificadoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function traerDatospEnviar()
    {
        $user = Auth::user();
        $userEmpresa = $user->empresa;
        $empresas = operadoralm::where('gener_nom', 'LIKE', '%' . $userEmpresa . '%')->get();
        return view('opalmacenamiento.enviar', ['empresas' => $empresas]);
    }

    public function traerDatospCertificar(Request $request)
    {
        $generador = $request->input('generador');
        $um = $request->input('um');

        $resultados = manifiesto::where('gener_nom', 'LIKE', '%' . $generador . '%')->get();
        $resultado2 = manifiesto::where('simple_multiple', 'LIKE', '%' . 'VARIOS' . '%')->get();
        return view('opalmacenamiento.listamanifparaenviar', compact('resultados', 'resultado2', 'um'));
    }

    public function traerDatospgenerarCertif()
    {
        $user = Auth::user();
        $userEmpresa = $user->empresa;
        $empresas = operadoralm::where('gener_nom', 'LIKE', '%' . $userEmpresa . '%')->get();
        return view('opalmacenamiento.generarcert', ['empresas' => $empresas]);
    }

    public function traerDatospgenerarCertificar(Request $request)
    {
        $operador = $request->input('operador');
        $generador = $request->input('generador');

        $resultados = manifiesto::where('nom_comp', 'LIKE', '%' . $generador . '%')
            ->where('gener_nom', 'LIKE', '%' . $operador . '%')
            ->get();

        return view('opalmacenamiento.listamanifiestosacertificar', compact('resultados'));
    }


    public function recibirManifiestos(Request $request)
    {

        $user = Auth::user();
        $userEmpresa = $user->empresa;
        $datos = manifiesto::where('gener_nom', 'LIKE', '%' . $userEmpresa . '%')
            ->where('estadoo', 'LIKE', '%' . 'INICIADO' . '%')
            ->get();
        return view('opalmacenamiento.recibir', compact('datos'));
    }

    public function traerDatospEnviar2()
    {
        $user = Auth::user();
        $userEmpresa = $user->empresa;
        $empresas = operadordf::where('id_operador_df', 'LIKE', '%' . $userEmpresa . '%')->get();
        return view('opdispfinal.generar', ['empresas' => $empresas]);
    }

    public function traerDatosFinalpCertificar(Request $request)
    {
        $operador = $request->input('operador');
        $certificado = $request->input('certificado');
        $manifiesto = $request->input('manifiesto');
        $generador = $request->input('generador');


        $consultaManifiestoDet = manifiestodet::where('id_manifies', '=', $manifiesto)->get();
        $consultaOperador = operadordf::where('id_operador_df', 'LIKE', '%' . $operador . '%')->get();
        $consultaManifiesto = manifiesto::where('id_manifiesto', '=', $manifiesto)->get();
        $consultaGenerador = operadoralm::where('gener_nom', 'LIKE', '%' . $generador . '%')->get();


        return view('opdispfinal.generarcertificado', compact('operador', 'certificado', 'manifiesto', 'generador', 'consultaManifiestoDet', 'consultaOperador', 'consultaManifiesto', 'consultaGenerador'));
    }

    public function actualizarCertificadopDispFinal(Request $request)
    {
        if ($request->input('manifiestoId') && $request->input('manifiestoSeleccion')) {
            $manifiestoSeleccionado = $request->input('manifiestoId');
            $manifestoCertifica = $request->input('manifiestoSeleccion');
            $um = $request->input('um');

            manifiestodet::where('id', '=', $manifiestoSeleccionado)
                ->where('um', 'LIKE', '%' . $um . '%')
                ->update(['id_man_tra_nac' => $manifestoCertifica]);

            return redirect('/enviarmanifiestoalm');
        } else {
            return view('mensajes.noseleccion');
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
    public function store(Request $request)
    {
        //
    }

    public function envioManifiesto(Request $request)
    {
        //
    }
    /**
     * Display the specified resource.
     */
    public function show(certificado $certificado)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(certificado $certificado)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, certificado $certificado)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(certificado $certificado)
    {
        //
    }
}
