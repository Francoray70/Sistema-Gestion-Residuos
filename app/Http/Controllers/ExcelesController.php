<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ExcelesController extends Controller
{
    public function excelGenerador(Request $request)
    {
        $generador = $request->input('generador');
        $fechainicio = $request->input('fechainicio');
        $fechafinal = $request->input('fechafinal');

        return view('generadores.excelgenerador', compact('generador', 'fechainicio', 'fechafinal'));
    }

    public function excelTransporte(Request $request)
    {
        $transporte = $request->input('transporte');
        $fechainicio = $request->input('fechainicio');
        $fechafinal = $request->input('fechafinal');

        return view('transportistas.exceltransportista', compact('transporte', 'fechainicio', 'fechafinal'));
    }

    public function excelOpalm(Request $request)
    {
        $generador = $request->input('generador');
        $fechainicio = $request->input('fechainicio');
        $fechafinal = $request->input('fechafinal');

        return view('opalmacenamiento.exceloperador', compact('generador', 'fechainicio', 'fechafinal'));
    }

    public function excelRpg(Request $request)
    {
        $operador = $request->input('operador');
        $fechainicio = $request->input('fechainicio');
        $fechafinal = $request->input('fechafinal');

        return view('opalmacenamiento.excelrpg', compact('operador', 'fechainicio', 'fechafinal'));
    }

    public function excelOdf(Request $request)
    {
        $generador = $request->input('generador');
        $fechainicio = $request->input('fechainicio');
        $fechafinal = $request->input('fechafinal');

        return view('opdispfinal.excelodf', compact('generador', 'fechainicio', 'fechafinal'));
    }

    public function excelCertificado(Request $request)
    {
        $operador = $request->input('operador');
        $fechainicio = $request->input('fechainicio');
        $fechafinal = $request->input('fechafinal');

        return view('opdispfinal.excelopdisfinal', compact('operador', 'fechainicio', 'fechafinal'));
    }
}
