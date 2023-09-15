<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\manifiestodet;
use App\Models\manifiesto;
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
            $nombreGene = manifiesto::where('id_manifiesto', '=', $numManifiesto)->get();

            if ($manifiesto) {
                return view('transportistas.listadetalles', compact('manifiesto', 'nombreGene'));
            } else {
                return view('transportistas.listacabeceras');
            }
        } else {
            return view('mensajes.noseleccion');
        }
    }

    public function traerDetallepEditar(Request $request, $id)
    {
        //
        $user = Auth::user();
        $userEmpresa = $user->empresa;
        $manifiesto = manifiestodet::where('id', '=', $id)
            ->where('estadooo', '=', 'INICIADO')
            ->get();
        $transporte = Transportista::where('id_transp', 'LIKE', '%' . $userEmpresa . '%')->get();

        $comprobar = $manifiesto->count();

        if ($comprobar) {
            return view('transportistas.editardetalle', compact('manifiesto', 'transporte'));
        } else {
            return view('mensajes.manifiestonoeditable');
        }
    }

    public function traerDetallepEditarRecibido(Request $request, $id)
    {
        //
        $user = Auth::user();
        $userEmpresa = $user->empresa;
        $manifiesto = manifiestodet::where('id', '=', $id)
            ->where('estadooo', '=', 'INICIADO')
            ->get();

        foreach ($manifiesto as $transporteData) {
            $userTransporte = $transporteData->id_transpo;
        }
        $transporte = Transportista::where('id_transp', 'LIKE', '%' . $userTransporte . '%')->get();

        $comprobar = $manifiesto->count();

        if ($comprobar) {
            return view('transportistas.editardetalleRecibido', compact('manifiesto', 'transporte'));
        } else {
            return view('mensajes.manifiestonoeditable');
        }
    }

    public function sumarDetalle(Request $request, $id)
    {
        $user = Auth::user();
        $userEmpresa = $user->empresa;

        $id = manifiestodet::where('id', '=', $id)
            ->where('estadooo', '=', 'INICIADO')
            ->get();

        $conteo = $id->count();

        if (!$conteo) {
            return view('mensajes.manifiestonoeditable');
        } else {

            foreach ($id as $datosId) {
                $buscar = $datosId->id_manifies;
            }
            $comprobar = manifiestodet::where('id_manifies', '=', $buscar)->get();
            $verificar = $comprobar->count();

            if ($verificar < 4) {

                $empresa = Transportista::where('id_transp', 'LIKE', '%' . $userEmpresa . '%')->get();

                return view('transportistas.sumardetalle', compact('id', 'empresa'));
            } else {
                return view('mensajes.impedirsumadetalle');
            }
        }
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
                'estado_det_manif' => $request->input('estado_det'),
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
    public function editarDetalleManifiesto(Request $request)
    {
        //
        $datosDetalle = [
            'id_corrientes' => $request->input('corrientes'),
            'um' => $request->input('um'),
            'estado' => $request->input('estado'),
            'cantidad' => $request->input('cantidad'),
            'descr_ingreso' => $request->input('descr_ingreso'),
            'descripcion' => $request->input('descripcion'),
            'updated_at' => $request->input('fecha'),
        ];

        manifiestodet::where('id', '=', $request->input('id'))->update($datosDetalle);

        return redirect('/listacabeceras');
    }

    public function editarDetalleManifiestoRecibido(Request $request)
    {
        //
        $datosDetalle = [
            'id_corrientes' => $request->input('corrientes'),
            'um' => $request->input('um'),
            'estado' => $request->input('estado'),
            'cantidad' => $request->input('cantidad'),
            'descr_ingreso' => $request->input('descr_ingreso'),
            'descripcion' => $request->input('descripcion'),
            'updated_at' => $request->input('fecha'),
        ];

        manifiestodet::where('id', '=', $request->input('id'))->update($datosDetalle);

        return redirect(url()->previous());
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
