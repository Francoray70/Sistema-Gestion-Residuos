<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

use App\Models\Empresas;
use App\Models\provincia;
use App\Models\Transportista;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TransportistaController extends Controller
{
    /**
     * Display a listing of the resource.
     */


    public function traerDatos()
    {
        //
        $user = Auth::user();
        $userEmpresa = $user->empresa;
        $empresas = Empresas::where('nombre', 'LIKE', '%' . $userEmpresa . '%')->get();
        $provincias = provincia::orderBy('provincia')->get();
        return view('transportistas.index', compact('empresas', 'provincias'));
    }


    public function index()
    {
        //
        $user = Auth::user();
        $userEmpresa = $user->empresa;
        $userRol = $user->rol_id;

        if ($userRol == '6') {

            $registros = Transportista::all();
            return view('transportistas.listatransportes', compact('registros'));
        } else {
            $registros = Transportista::where('id_transp', 'LIKE', '%' . $userEmpresa . '%')->get();

            $comprobar = $registros->count();

            if ($comprobar) {
                return view('transportistas.listatransportes', compact('registros'));
            } else {
                return redirect('/transportistas');
            }
        }
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
        $datosTransporte = request()->except('_token');

        if ($request->hasFile('hab_mun_transp')) {
            $datosTransporte['hab_mun_transp'] = $request->file('hab_mun_transp')->store('transporte', 'public');
        }

        if ($request->hasFile('hab_pcia_transp')) {
            $datosTransporte['hab_pcia_transp'] = $request->file('hab_pcia_transp')->store('transporte', 'public');
        }

        if ($request->hasFile('hab_nac_transp')) {
            $datosTransporte['hab_nac_transp'] = $request->file('hab_nac_transp')->store('transporte', 'public');
        }

        Transportista::insert($datosTransporte);

        return redirect('/listatransportes');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
        $id = Transportista::find($id);
        return view('transportistas.editartransporte', ['id' => $id]);
    }

    public function showImg($id)
    {
        //
        $id2 = Transportista::find($id);
        return view('transportistas.actualizarimagenes', ['id' => $id2]);
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Transportista $transportista)
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
        Transportista::where('id', '=', $id)->update($datosEmpresa);

        return redirect('/listatransportes')->with('success', 'Empresa cargada con exito');
    }

    public function updateImg(Request $request, $id)
    {
        //
        $datosTransporte = request()->except(['_token', '_method']);

        if ($request->hasFile('hab_mun_transp')) {
            $datosTransporte['hab_mun_transp'] = $request->file('hab_mun_transp')->store('transporte', 'public');
        }

        if ($request->hasFile('hab_pcia_transp')) {
            $datosTransporte['hab_pcia_transp'] = $request->file('hab_pcia_transp')->store('transporte', 'public');
        }

        if ($request->hasFile('hab_nac_transp')) {
            $datosTransporte['hab_nac_transp'] = $request->file('hab_nac_transp')->store('transporte', 'public');
        }

        Transportista::where('id', '=', $id)->update($datosTransporte);

        return redirect('/listatransportes')->with('success_message', 'Empresa cargada con exito');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Transportista $transportista)
    {
        //
    }
}
