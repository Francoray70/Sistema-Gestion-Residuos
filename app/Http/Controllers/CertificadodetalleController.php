<?php

namespace App\Http\Controllers;

use App\Models\certificadodetalle;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CertificadodetalleController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function traerCertificadosDetalles(Request $request)
    {
        if ($request->input('id')) {
            $numCertif = $request->input('id');
            $resultados = certificadodetalle::where('numero_certif', '=', $numCertif)->get();

            $verificar = $resultados->count();

            if ($verificar) {
                return view('opdispfinal.listadetalles', compact('resultados'));
            } else {
                return view('opdispfinal.listacabecerasCer');
            }
        } else {
            return view('mensajes.noseleccion');
        }
    }

    public function index()
    {
        //
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

    /**
     * Display the specified resource.
     */
    public function show(certificadodetalle $certificadodetalle)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(certificadodetalle $certificadodetalle)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, certificadodetalle $certificadodetalle)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(certificadodetalle $certificadodetalle)
    {
        //
    }
}
