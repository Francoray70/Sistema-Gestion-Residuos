<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Transportista;
use App\Models\chofer;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ChoferController extends Controller
{
    /**
     * Display a listing of the resource.
     */


    public function traerDatos()
    {
        //
        $user = Auth::user();
        $userEmpresa = $user->empresa;
        $transporte = Transportista::where('id_transp', 'LIKE', '%' . $userEmpresa . '%')->get();
        return view('transportistas.choferes', ['transporte' => $transporte]);
    }

    public function index()
    {
        //

        $user = Auth::user();
        $userEmpresa = $user->empresa;
        $userRol = $user->rol_id;

        if ($userRol == '6') {

            $choferes = chofer::all();
            return view('transportistas.listachoferes', compact('choferes'));
        } else {
            $choferes = chofer::where('id_transp', 'LIKE', '%' . $userEmpresa . '%')->get();

            $comprobar = $choferes->count();

            if ($comprobar) {
                return view('transportistas.listachoferes', compact('choferes'));
            } else {
                return redirect('/choferes');
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
        $datosChofer = request()->except('_token');

        if ($request->hasFile('nro_carnet_img')) {
            $datosChofer['nro_carnet_img'] = $request->file('nro_carnet_img')->store('chofer', 'public');
        }

        if ($request->hasFile('carga_pelig_img')) {
            $datosChofer['carga_pelig_img'] = $request->file('carga_pelig_img')->store('chofer', 'public');
        }

        if ($request->hasFile('sep_img')) {
            $datosChofer['sep_img'] = $request->file('sep_img')->store('chofer', 'public');
        }

        chofer::insert($datosChofer);

        return redirect('/listachoferes')->with('success_message', 'Empresa cargada con exito');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
        $id = chofer::find($id);
        return view('transportistas.editarchofer', ['id' => $id]);
    }

    public function showImg($id)
    {
        //
        $id2 = chofer::find($id);
        return view('transportistas.actualizarimageneschof', ['id' => $id2]);
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(chofer $chofer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //
        $datosCorrientes = request()->except(['_token', '_method']);
        chofer::where('id', '=', $id)->update($datosCorrientes);

        return redirect('/listachoferes')->with('success_message', 'Empresa cargada con exito');
    }


    public function updateImg(Request $request, $id)
    {
        //
        $datosChofer = request()->except(['_token', '_method']);

        if ($request->hasFile('nro_carnet_img')) {
            $datosChofer['nro_carnet_img'] = $request->file('nro_carnet_img')->store('chofer', 'public');
        }

        if ($request->hasFile('carga_pelig_img')) {
            $datosChofer['carga_pelig_img'] = $request->file('carga_pelig_img')->store('chofer', 'public');
        }

        if ($request->hasFile('sep_img')) {
            $datosChofer['sep_img'] = $request->file('sep_img')->store('chofer', 'public');

            chofer::where('id', '=', $id)->update($datosChofer);

            return redirect('/listachoferes')->with('success_message', 'Empresa cargada con exito');
        }
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(chofer $chofer)
    {
        //
    }
}
