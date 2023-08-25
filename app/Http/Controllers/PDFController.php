<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\manifiesto;
use Barryvdh\DomPDF\Facade\Pdf;

class PDFController extends Controller
{
    //
    public function generarPDF()
    {
        $pdf = PDF::loadView('pdf.manifiestocargado')->setPaper('a4', 'portrait')->setWarnings(false);
        return $pdf->stream();
    }
}
