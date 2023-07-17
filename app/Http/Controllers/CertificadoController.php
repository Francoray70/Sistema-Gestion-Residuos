<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

use App\Models\certificado;
use App\Models\manifiesto;
use App\Models\manifiestodet;
use App\Models\operadoralm;
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
        $resultados = manifiesto::where('gener_nom', 'LIKE', '%' . $userEmpresa . '%')
            ->where('estadoo', 'LIKE', '%' . 'INICIADO' . '%')
            ->get();
        return view('opalmacenamiento.recibir', compact('resultados'));
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
