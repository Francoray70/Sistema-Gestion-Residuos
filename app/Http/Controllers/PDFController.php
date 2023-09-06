<?php

namespace App\Http\Controllers;

use App\Models\manifiesto;
use App\Models\certificado;
use Barryvdh\DomPDF\Facade\Pdf;
//use QrCode;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PDFController extends Controller
{
    //
    public function generarPDF(Request $request)
    {
        $id = $request->input('id');

        if ($id) {

            //$manifiesto = manifiesto::where('id', '=', $id)->get();

            // $pdf = PDF::loadView('pdf.manifiestocargado', compact('manifiesto'));
            // return $pdf->stream();
            // return $pdf->download('manifiesto_reimpreso.pdf');

            //return QrCode::size(300)->generate($id);
        } else {
            return view('mensajes.noseleccion');
        }
    }
    public function generarCertificado(Request $request)
    {
        $id = $request->input('id');

        if ($id) {
            $certificado = certificado::where('id', '=', $id)->get();

            $pdf = PDF::loadView('pdf.certificadocargado', compact('certificado'));
            $pdf->setPaper('a2', 'landscape');
            return $pdf->download('certificado_reimpreso.pdf');
        } else {
            return view('mensajes.noseleccion');
        }
    }
}
