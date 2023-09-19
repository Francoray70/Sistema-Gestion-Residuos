<?php

namespace App\Http\Controllers;

use App\Models\manifiesto;
use App\Models\certificado;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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

        if ($id) {
            $certificado = certificado::where('nro_cert_disp_final', '=', $id)->get();
            foreach ($certificado as $data) {
                $numeroCertif = $data->nro_cert_disp_final;
            }

            $pdf = PDF::loadView('pdf.rpgcargado', compact('certificado'));
            $pdf->setPaper('a2', 'landscape');
            return $pdf->download($numeroCertif . '.pdf');
        } else {
            return view('mensajes.noseleccion');
        }
    }
}
