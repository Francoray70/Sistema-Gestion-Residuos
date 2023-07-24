<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Empresas;
use App\Models\provincia;
use App\Models\operadordf;
use App\Models\manifiesto;
use App\Models\manifiestodet;
use Carbon\Carbon;

class OperadordfController extends Controller
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
        return view('opdispfinal.index', compact('provincias', 'empresas'));
    }


    public function traerDatosdeManifiestos()
    {
        //
        $user = Auth::user();
        $userEmpresa = $user->empresa;
        $userRol = $user->rol_id;

        if ($userRol == '6') {

            $datos = manifiesto::all();
            return view('opdispfinal.recibir', compact('datos'));
        } else {
            $datos = manifiesto::where('gener_nom', 'LIKE', '%' . $userEmpresa . '%')
                ->where('estadoo', '=', 'INICIADO')
                ->get();
            return view('opdispfinal.recibir', compact('datos'));
        }
    }

    public function autorizarOrechazar(Request $request)
    {
        $fecha = Carbon::now();

        if ($request->input('autorizar')) {
            $id = $request->input('autorizar');
            $updateCabecera = manifiesto::where('id_manifiesto', $id);

            $updateCabecera->update(['estadoo' => 'ALTA', 'fecha_autorizacion' => $fecha]);

            manifiestodet::where('id_manifies', $id)->update(['estadooo' => 'ALTA']);

            return redirect('/recibirmanifopdispfinal')->with('success_message', 'Empresa cargada con éxito');
        }

        if ($request->input('rechazar')) {
            $id = $request->input('rechazar');
            $updateCabecera = manifiesto::where('id_manifiesto', $id);

            $updateCabecera->update(['estadoo' => 'BAJA', 'fecha_autorizacion' => $fecha]);

            manifiestodet::where('id_manifies', $id)->update(['estadooo' => 'BAJA']);

            return redirect('/recibirmanifopdispfinal')->with('success_message', 'Empresa cargada con éxito');
        }

        if ($request->input('buscar')) {
            $numManif = $request->input('buscar');

            $datos = manifiestodet::where('id_manifies', $numManif)->where('estadooo', 'INICIADO')->get();
            if ($datos) {
                return view('opdispfinal.recbiridet', compact('datos'));
            } else {
                return view('mensajes.sinmanifiesto');
            }
        }
    }

    public function index()
    {
        //

        $user = Auth::user();
        $userEmpresa = $user->empresa;
        $userRol = $user->rol_id;

        if ($userRol == '6') {

            $operadores = operadordf::all();
            return view('opdispfinal.listaodf', ['operadores' => $operadores]);
        } else {
            $operadores = operadordf::where('id_operador_df', 'LIKE', '%' . $userEmpresa . '%')->get();

            $comprobar = $operadores->count();

            if ($comprobar) {
                return view('opdispfinal.listaodf', ['operadores' => $operadores]);
            } else {
                return redirect('/opalmacenamiento');
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
        $datosEmpresa = request()->except('_token');

        if ($request->hasFile('hab_mun_odf')) {
            $datosEmpresa['hab_mun_odf'] = $request->file('hab_mun_odf')->store('operadorpordf', 'public');
        }

        if ($request->hasFile('hab_pro_odf')) {
            $datosEmpresa['hab_pro_odf'] = $request->file('hab_pro_odf')->store('operadorpordf', 'public');
        }

        if ($request->hasFile('habil_nacion')) {
            $datosEmpresa['habil_nacion'] = $request->file('habil_nacion')->store('operadorpordf', 'public');
        }
        operadordf::insert($datosEmpresa);

        return redirect('/listaodf')->with('success_message', 'Empresa cargada con exito');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
        $id = operadordf::find($id);
        return view('opdispfinal.editaroperador', ['id' => $id]);
    }


    public function showImg($id)
    {
        //
        $id2 = operadordf::find($id);
        return view('opdispfinal.actualizarimagenes', ['id' => $id2]);
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(operadordf $operadordf)
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
        operadordf::where('id', '=', $id)->update($datosEmpresa);

        return redirect('/listaodf')->with('success_message', 'Empresa cargada con exito');
    }

    public function updateImg(Request $request, $id)
    {
        //
        $datosEmpresa = request()->except(['_token', '_method']);

        if ($request->hasFile('hab_mun_odf')) {
            $datosEmpresa['hab_mun_odf'] = $request->file('hab_mun_odf')->store('operadorpordf', 'public');
        }

        if ($request->hasFile('hab_pro_odf')) {
            $datosEmpresa['hab_pro_odf'] = $request->file('hab_pro_odf')->store('operadorpordf', 'public');
        }

        if ($request->hasFile('habil_nacion')) {
            $datosEmpresa['habil_nacion'] = $request->file('habil_nacion')->store('operadorpordf', 'public');
        }

        operadordf::where('id', '=', $id)->update($datosEmpresa);

        return redirect('/listaodf')->with('success_message', 'Empresa cargada con exito');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(operadordf $operadordf)
    {
        //
    }
}
