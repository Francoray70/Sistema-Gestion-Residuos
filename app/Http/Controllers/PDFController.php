<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Dompdf;

class PDFController extends Controller
{
    //
    public function generarPDF()
    {
        $data = [
            'title' => 'Ejemplo de PDF con Laravel',
        ];
        // Renderizar la vista 'pdf.ejemplo' con los datos proporcionados
        $html = view('pdf.ejemplo', $data)->render();

        // Crear un objeto PDF a partir del contenido HTML
        $pdf = new \Dompdf\Dompdf();
        $pdf->loadHtml($html);

        // Generar el PDF
        $pdf->setPaper('A4', 'portrait'); // Opciones de formato de papel
        $pdf->render();

        // Descargar el PDF con el nombre 'ejemplo.pdf'
        return $pdf->stream('ejemplo.pdf');
    }
}
