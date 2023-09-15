<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\provincia;
use App\Models\Empresas;
use App\Models\operadoralm;
use App\Models\manifiesto;
use App\Models\manifiestodet;
use Carbon\Carbon;

class OperadoralmController extends Controller
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
        return view('opalmacenamiento.index', compact('empresas', 'provincias'));
    }

    public function index()
    {
        //
        $user = Auth::user();
        $userEmpresa = $user->empresa;
        $userRol = $user->rol_id;

        if ($userRol == '6') {

            $datosOperador = operadoralm::all();
            return view('opalmacenamiento.listaoperadores', ['operadores' => $datosOperador]);
        } else {
            $datosOperador = operadoralm::where('gener_nom', 'LIKE', '%' . $userEmpresa . '%')->get();

            $comprobar = $datosOperador->count();

            if ($comprobar) {
                return view('opalmacenamiento.listaoperadores', ['operadores' => $datosOperador]);
            } else {
                return redirect('/opalmacenamiento');
            }
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

            return redirect('/recibirmanifiestoalm')->with('success_message', 'Empresa cargada con éxito');
        }

        if ($request->input('rechazar')) {
            $id = $request->input('rechazar');
            $updateCabecera = manifiesto::where('id_manifiesto', $id);

            $updateCabecera->update(['estadoo' => 'BAJA', 'fecha_autorizacion' => $fecha]);

            manifiestodet::where('id_manifies', $id)->update(['estadooo' => 'BAJA']);

            return redirect('/recibirmanifiestoalm')->with('success_message', 'Empresa cargada con éxito');
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

    public function showImg($id)
    {
        //
        $id = operadoralm::find($id);
        return view('opalmacenamiento.actualizarimagenes', ['id' => $id]);
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

    public function updateImg(Request $request, $id)
    {
        //
        $datosEmpresa = request()->except(['_token', '_method']);

        if ($request->hasFile('gener_hab_mun')) {
            $datosEmpresa['gener_hab_mun'] = $request->file('gener_hab_mun')->store('generadorprincipal', 'public');
        }

        if ($request->hasFile('gener_hab_pro')) {
            $datosEmpresa['gener_hab_pro'] = $request->file('gener_hab_pro')->store('generadorprincipal', 'public');
        }

        if ($request->hasFile('gener_hab_nac')) {
            $datosEmpresa['gener_hab_nac'] = $request->file('gener_hab_nac')->store('generadorprincipal', 'public');
        }

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
