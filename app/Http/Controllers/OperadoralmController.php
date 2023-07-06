<?php

namespace App\Http\Controllers;

use App\Models\provincia;
use App\Models\Empresas;
use App\Models\operadoralm;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OperadoralmController extends Controller
{
    /**
     * Display a listing of the resource.
     */


    public function traerDatos()
    {
        //
        $empresas = Empresas::all();
        $provincias = provincia::orderBy('provincia')->get();
        return view('opalmacenamiento.index', compact('empresas', 'provincias'));
    }

    public function index()
    {
        //
        $datosOperador = operadoralm::all();
        return view('opalmacenamiento.listaoperadores', ['operadores' => $datosOperador]);
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
        $datosEmpresa = request()->except('_token');

        if ($request->hasFile('gener_hab_mun')) {
            $datosEmpresa['gener_hab_mun'] = $request->file('gener_hab_mun')->store('generadorprincipal', 'public');
        }

        if ($request->hasFile('gener_hab_pro')) {
            $datosEmpresa['gener_hab_pro'] = $request->file('gener_hab_pro')->store('generadorprincipal', 'public');
        }

        if ($request->hasFile('gener_hab_nac')) {
            $datosEmpresa['gener_hab_nac'] = $request->file('gener_hab_nac')->store('generadorprincipal', 'public');
        }
        operadoralm::insert($datosEmpresa);

        return redirect('/listaopalm')->with('success_message', 'Empresa cargada con exito');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
        $id = operadoralm::find($id);
        return view('opalmacenamiento.editaroperador', ['id' => $id]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(operadoralm $operadoralm)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //
        $datosEmpresa = request()->except(['_token', '_method']);
        operadoralm::where('id', '=', $id)->update($datosEmpresa);

        return redirect('/listaopalm')->with('success_message', 'Empresa cargada con exito');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(operadoralm $operadoralm)
    {
        //
    }
}
