<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

use App\Models\certificado;
use App\Models\certificadodetalle;
use App\Models\manifiesto;
use App\Models\manifiestodet;
use App\Models\operadoralm;
use App\Models\operadordf;
use App\Http\Controllers\Controller;
use App\Models\Empresas;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

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
        $rpg = $request->input('rpg');

        $resultados = manifiesto::where('nom_comp', 'LIKE', '%' . $generador . '%')
            ->where('gener_nom', 'LIKE', '%' . $operador . '%')
            ->get();

        $verificar = $resultados->count();
        if ($verificar == 0) {
            return view('mensajes.nohaymanifprpg');
        } else {

            foreach ($resultados as $datoManifiesto) {
                $numeroManifiesto = $datoManifiesto->id_man_tra_nac;
            }

            $resultado2 = manifiesto::where('id_manifiesto', '=', $numeroManifiesto)->get();

            return view('opalmacenamiento.listamanifiestosacertificar', compact('resultados', 'resultado2', 'rpg'));
        }
    }

    public function recibirManifiestos(Request $request)
    {

        $user = Auth::user();
        $userEmpresa = $user->empresa;
        $datos = manifiesto::where('gener_nom', 'LIKE', '%' . $userEmpresa . '%')
            ->where('estadoo', 'LIKE', '%' . 'INICIADO' . '%')
            ->get();

        $verificar = $datos->count();
        if ($verificar) {
            return view('opalmacenamiento.recibir', compact('datos'));
        } else {
            return view('mensajes.notienepararecibir');
        }
    }

    public function traerDatospEnviar2()
    {
        $user = Auth::user();
        $userEmpresa = $user->empresa;

        $pago = Empresas::where('nombre', 'LIKE', '%' . $userEmpresa . '%')
            ->where('pago', '=', 'SI')
            ->get();

        $verificar = $pago->count();

        if ($verificar) {
            $empresas = operadordf::where('id_operador_df', 'LIKE', '%' . $userEmpresa . '%')->get();

            $comprobar = $empresas->count();

            if ($comprobar) {
                return view('opdispfinal.generar', ['empresas' => $empresas]);
            } else {
                return view('mensajes.nooperador');
            }
        } else {
            return view('mensajes.nopago');
        }
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

    public function traerDatosFinalpCertificarOff(Request $request)
    {
        $operador = $request->input('operador');
        $certi = $request->input('certificado');
        $certi2 = $request->input('certificado2');
        $certificado = $certi . $certi2;
        $manifiesto = $request->input('manifiesto');
        $generador = $request->input('generador');


        $consultaManifiestoDet = manifiestodet::where('id_manifies', '=', $manifiesto)->get();
        $consultaOperador = operadordf::where('id_operador_df', 'LIKE', '%' . $operador . '%')->get();
        $consultaManifiesto = manifiesto::where('id_manifiesto', '=', $manifiesto)->get();
        $consultaGenerador = operadoralm::where('gener_nom', 'LIKE', '%' . $generador . '%')->get();

        $verificarCertificado = certificado::where('nro_cert_disp_final', '=', $certificado)->get();
        $comprobar = $verificarCertificado->count();

        if ($comprobar) {
            return view('mensajes.certificadoexistente');
        } else {
            return view('opdispfinal.generarcertificadoff', compact('operador', 'certificado', 'manifiesto', 'generador', 'consultaManifiestoDet', 'consultaOperador', 'consultaManifiesto', 'consultaGenerador'));
        }
    }


    public function actualizarCertificadopDispFinal(Request $request)
    {
        if ($request->input('manifiestoId') && $request->input('manifiestoSeleccion')) {

            $manifiestoSeleccion = $request->input('manifiestoId');
            $rowCount = count($manifiestoSeleccion);
            $manifestoCertifica = $request->input('manifiestoSeleccion');
            $um = $request->input('um');

            for ($i = 0; $i < $rowCount; $i++) {
                manifiestodet::where('id', '=', $manifiestoSeleccion[$i])
                    ->where('um', 'LIKE', '%' . $um . '%')
                    ->update(['id_man_tra_nac' => $manifestoCertifica]);
            }
            return redirect('/enviarmanifiestoalm');
        } else {
            return view('mensajes.noseleccion');
        }
    }

    public function cargarCertificadoDF(Request $request)
    {
        $fecha = Carbon::now();

        $numCertificado = $request->input('certificadodf');
        $Verifica = certificado::where('nro_cert_disp_final', '=', $numCertificado)->get();
        $check = $Verifica->count();

        if ($check > 0) {
            return view('mensajes.certificadoexistente');
        } else {

            $datosCertificado = [
                'useralta' => $request->input('idusuario'),
                'provonac' => $request->input('tipo'),
                'opdfinal' => $request->input('operador'),
                'nro_cert_disp_final' => $request->input('certificadodf'),
                'num_manifiesto' => $request->input('manifiesto'),
                'fechacertificado' => $request->input('fechacertificado'),
                'generador' => $request->input('generador'),
                'num_hab_nac_odf' => $request->input('nro_hab_nac'),
                'vto_hab_nac_odf' => $request->input('vto_hab_nac'),
                'num_hab_pro_odf' => $request->input('hab_pro_nro_odf'),
                'vto_hab_pro_odf' => $request->input('hab_pro_vto_odf'),
                'num_hab_nacional_gen' => $request->input('nrogenerador'),
                'vto_hab_nacional_gen' => $request->input('vtogenerador'),
            ];

            certificado::insert($datosCertificado);

            $corrientes = $request->input('corriente');
            $descripcion = $request->input('descripcion');
            $contenedor = $request->input('contenedor');
            $cantidad = $request->input('cantidad');
            $tratamiento = $request->input('tratamiento');
            $estado = $request->input('estado');
            $certificado = $request->input('certificadodf');
            $fechacertif = $request->input('fechacertificado');
            $transporte = $request->input('transporte');
            $ubicacion = $request->input('ubi_odf');
            $manifiesto = $request->input('manifiesto');

            $rowCount = count($tratamiento);

            for ($i = 0; $i < $rowCount; $i++) {

                $datoDetalle = ([
                    'corriente' => $corrientes[$i],
                    'numero_certif' => $certificado,
                    'numero_manifiesto' => $manifiesto,
                    'fechatratamiento' => $fechacertif,
                    'descripcion' => $descripcion[$i],
                    'um' => $contenedor[$i],
                    'cantidad' => $cantidad[$i],
                    'tipotratamiento' => $tratamiento[$i],
                    'estado' => $estado[$i],
                    'ubicacion' => $ubicacion,
                    'updated_at' => $fecha,
                    'created_at' => $fecha,
                    'transportista' => $transporte,
                ]);

                certificadodetalle::insert($datoDetalle);
            }

            $operador = $request->input('operador');

            $busqueda = operadordf::where('id_operador_df', '=', $operador)->get();
            foreach ($busqueda as $datoBusqueda) {
                $ncertificado = $datoBusqueda->cdf_actual;
            }
            $nrocertifinal = $ncertificado + 1;

            operadordf::where('id_operador_df', 'LIKE', '%' . $operador . '%')->update(['cdf_actual' => $nrocertifinal]);

            manifiestodet::where('id_manifies', '=', $manifiesto)->update(['nro_cert_disp_final' => $certificado, 'estado_det_manif' => 'DISPOSICIÓN FINAL']);
            manifiestodet::where('id_man_tra_nac', '=', $manifiesto)->update(['nro_cert_disp_final' => $certificado, 'estado_det_manif' => 'DISPOSICIÓN FINAL']);

            $certificado = certificado::where('nro_cert_disp_final', '=', $numCertificado)->get();
            foreach ($certificado as $data) {
                $numeroCertif = $data->nro_cert_disp_final;
            }

            $pdf = PDF::loadView('pdf.certificadonuevo', compact('certificado'));
            $pdf->setPaper('a2', 'landscape');
            return $pdf->download($numeroCertif . '.pdf');
        }
    }



    public function traerCertificadosCabecera(Request $request)
    {
        $user = Auth::user();
        $userEmpresa = $user->empresa;
        $resultados = certificado::where('opdfinal', 'LIKE', '%' . $userEmpresa . '%')->get();
        $verifico = $resultados->count();

        if ($verifico) {
            return view('opdispfinal.listacabecerasCer', compact('resultados'));
        } else {
            return view('mensajes.notienecertificado');
        }
    }


    public function traerDatospReimprimir(Request $request)
    {
        $user = Auth::user();
        $userEmpresa = $user->empresa;
        $resultados = certificado::where('opdfinal', 'LIKE', '%' . $userEmpresa . '%')->get();
        $verifico = $resultados->count();

        if ($verifico) {
            return view('opdispfinal.reimprimircertif', compact('resultados'));
        } else {
            return view('mensajes.notienecertificado');
        }
    }

    public function index()
    {
        //
    }
    public function cargarRpg(Request $request)
    {
        $fecha = Carbon::now();
        $certirpg = $request->input('certirpg');
        $operador = $request->input('operador');
        $manifreal = $request->input('manifiestoreal');
        $generador = $request->input('generador');
        $certificadoRecibido = $request->input('certificado');
        $id = $request->input('id');

        $dato2 = operadoralm::where('gener_nom', 'LIKE', '%' . $operador . '%')->get();
        $dato3 = manifiestodet::where('id', '=', $id)->get();

        foreach ($dato2 as $DataSecond) {
            $ElCertificado1 = $DataSecond->gener_nro_hab_pro;
            $ElCertificado2 = $DataSecond->rpg_actual;
        }
        $ElCertificadoFinal = $ElCertificado1 - $ElCertificado2;
        $rpgFinal = $ElCertificado2 + 1;

        foreach ($dato3 as $DataThree) {
            $ElManifiesto1 = $DataThree->id_manifies;
            $ElManifiesto2 = $DataThree->nro_cert_disp_final;
        }

        manifiestodet::join('manifiesto', 'manifiestodet.id_manifies', '=', 'manifiesto.id_manifiesto')
            ->where('manifiesto.nom_comp', '=', $generador)
            ->where('manifiestodet.simp_multi', '=', 'UNO')
            ->where('manifiestodet.nro_cert_disp_final', '=', $ElManifiesto2)
            ->where('manifiestodet.rpg', '=', '')
            ->update(['manifiestodet.rpg' => $ElCertificado1, 'manifiestodet.nro_cert_rpg' => $certirpg]);

        operadoralm::where('gener_nom', 'LIKE', '%' . $operador . '%')
            ->update(['rpg_actual' => $rpgFinal]);


        $certificado = certificado::where('nro_cert_disp_final', '=', $certificadoRecibido)->get();
        foreach ($certificado as $data) {
            $numeroCertif = $data->nro_cert_disp_final;
        }

        $pdf = PDF::loadView('pdf.rpgcargado', compact('certificado'));
        $pdf->setPaper('a2', 'landscape');
        return $pdf->download($numeroCertif . '.pdf');
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
