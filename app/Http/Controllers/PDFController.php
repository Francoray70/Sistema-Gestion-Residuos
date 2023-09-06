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

            $manifiesto = manifiesto::where('id', '=', $id)->get();

            $pdf = PDF::loadView('pdf.manifiestocargado', compact('manifiesto'));
            return $pdf->download('manifiesto-reimpreso.pdf');
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
            return $pdf->download('certificado-reimpreso.pdf');
        } else {
            return view('mensajes.noseleccion');
        }
    }
}
