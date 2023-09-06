<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use QrCode;
use App\Http\Controllers\Controller;

class QrController extends Controller
{

    public function generateQRCode(Request $request)
    {
        return view('qr.qr');
    }
}
