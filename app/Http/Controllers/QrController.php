<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use QrCode;
use App\Http\Controllers\Controller;

class QrController extends Controller
{

    public function generateQRCode(Request $request)
    {
        $url = $request->input('url');

        // Verifica si la URL no es nula antes de generar el código QR
        if ($url) {
            // Genera el código QR
            return QrCode::size(300)->generate($url);
        } else {
            // Maneja el caso en el que la URL es nula
            return "URL no válida";
        }
    }
}
