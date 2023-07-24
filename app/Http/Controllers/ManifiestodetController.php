<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\manifiestodet;
use App\Models\Transportista;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ManifiestodetController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $manifiesto = manifiestodet::all();

        return view('transportistas.listadetalles', ['manifiesto' => $manifiesto]);
    }


    public function traerDetalles(Request $request)
    {
        //
        if ($request->input('id')) {
            $numManifiesto = $request->input('id');
            $manifiesto = manifiestodet::where('id_manifies', '=', $numManifiesto)->get();

            if ($manifiesto) {
                return view('transportistas.listadetalles', compact('manifiesto'));
            } else {
                return view('transportistas.listacabeceras');
            }
        } else {
            return view('mensajes.noseleccion');
        }
    }

    public function sumarDetalle(Request $request, $id)
    {
        $user = Auth::user();
        $userEmpresa = $user->empresa;

        $id = manifiestodet::where('id', '=', $id)
            ->where('estadooo', '=', 'INICIADO')
            ->get();
        $empresa = Transportista::where('id_transp', 'LIKE', '%' . $userEmpresa . '%')->get();
        return view('transportistas.sumardetalle', compact('id', 'empresa'));
    }

    public function confirmarNewDetalle(Request $request)
    {
        $user = Auth::user();
        $userId = $user->id;

        $datosDelNuevoDetalle =
            [
                'id_manifies' => $request->input('manifiesto'),
                'id_transpo' => $request->input('transporte'),
                'id_corrientes' => $request->input('corriente'),
                'um' => $request->input('um'),
                'estado' => $request->input('estado'),
                'cantidad' => $request->input('cantidad'),
                'descr_ingreso' => $request->input('descr_ingreso'),
                'descripcion' => $request->input('descripcion'),
                'simp_multi' => $request->input('alta'),
                'estado_det_manif' => $request->input('estado'),
                'estadooo' => 'INICIADO',
                'useralta' => $userId,
                'id_man_tra_nac' => '',
                'nro_cert_disp_final' => '',
                'rpg' => '',
                'nro_cert_rpg' => '',
                'fcha_entr_cdf' => $request->input('fecha'),
                'fcha_entr_cdf' => $request->input('fecha'),
                'updated_at' => $request->input('fecha'),
            ];

        manifiestodet::insert($datosDelNuevoDetalle);

        return view('transportistas.generarmanif');
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
    public function show(manifiestodet $manifiestodet)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(manifiestodet $manifiestodet)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, manifiestodet $manifiestodet)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(manifiestodet $manifiestodet)
    {
        //
    }
}
