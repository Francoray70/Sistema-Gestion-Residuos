<?php

namespace App\Http\Controllers;

use App\Models\manifiesto;
use App\Models\certificado;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\generador;
use App\Models\manifiestodet;
use App\Models\operadoralm;
use Illuminate\Support\Facades\Auth;

class PDFController extends Controller
{
    //
    public function generarPDF(Request $request)
    {
        $id = $request->input('id');

        if ($id) {

            $manifiesto = manifiesto::where('id', '=', $id)->get();
            foreach ($manifiesto as $data) {
                $numeroManif = $data->id_manifiesto;
            }

            $pdf = PDF::loadView('pdf.manifiestocargado', compact('manifiesto'));
            return $pdf->download($numeroManif . '.pdf');
        } else {
            return view('mensajes.noseleccion');
        }
    }

    public function generarCertificado(Request $request)
    {
        $id = $request->input('id');

        if ($id) {
            $certificado = certificado::where('id', '=', $id)->get();
            foreach ($certificado as $data) {
                $numeroCertif = $data->nro_cert_disp_final;
            }

            $pdf = PDF::loadView('pdf.certificadocargado', compact('certificado'));
            $pdf->setPaper('a2', 'landscape');
            return $pdf->download($numeroCertif . '.pdf');
        } else {
            return view('mensajes.noseleccion');
        }
    }

    public function generarRpg(Request $request)
    {
        $id = $request->input('id');

        $detalle = manifiestodet::where('id', '=', $id)->get();

        foreach ($detalle as $datosDetalle) {
            $certificadoDf = $datosDetalle->nro_cert_disp_final;
            $rpg = $datosDetalle->nro_cert_rpg;
            $manifiestoTN = $datosDetalle->id_man_tra_nac;
            $manifiesto = $datosDetalle->id_manifies;
        }

        $cabecera = manifiesto::where('id_manifiesto', '=', $manifiesto)->get();

        foreach ($cabecera as $datosCabecera) {
            $generadorNombre = $datosCabecera->nom_comp;
            $operador = $datosCabecera->gener_nom;
        }


        if ($id) {
            $certificado = certificado::where('nro_cert_disp_final', '=', $certificadoDf)
                ->join('certifdispfinaldetalle', 'certifdispfinaldetalle.numero_certif', '=', 'certifdispfinal.nro_cert_disp_final')
                ->select('certifdispfinaldetalle.*', 'certifdispfinal.*')
                ->get();
            $opalmacenamiento = operadoralm::where('gener_nom', 'LIKE', '%' . $operador . '%')->get();
            $generador = generador::where('nom_comp', 'LIKE', '%' . $generadorNombre . '%')->get();


            $pdf = PDF::loadView('pdf.rpgcargado', compact('certificado', 'manifiesto', 'manifiestoTN', 'opalmacenamiento', 'generador', 'generadorNombre', 'rpg'));
            $pdf->setPaper('a2', 'landscape');
            return $pdf->stream();
            //return $pdf->download($rpg . '.pdf');
        } else {
            return view('mensajes.noseleccion');
        }
    }
}
