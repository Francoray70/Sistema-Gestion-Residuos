<?php

namespace App\Http\Controllers;

use App\Models\provincia;
use App\Models\empresas;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EmpresasController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function traerDatos()
    {
        //
        $provincias = provincia::orderBy('provincia')->get();
        return view('usuarios.empresas', ['provincias' => $provincias]);
    }

    public function index()
    {
        //
        $registros = Empresas::all();
        return view('usuarios.listaempresas', ['registros' => $registros]);
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
        $cuit = $request->input('cuit');

        $coeficiente[0] = 5;
        $coeficiente[1] = 4;
        $coeficiente[2] = 3;
        $coeficiente[3] = 2;
        $coeficiente[4] = 7;
        $coeficiente[5] = 6;
        $coeficiente[6] = 5;
        $coeficiente[7] = 4;
        $coeficiente[8] = 3;
        $coeficiente[9] = 2;

        $resultado = 1;

        $cuit_rearmado = "";

        for ($i = 0; $i < strlen($cuit); $i = $i + 1) {    //separo cualquier caracter que no tenga que ver con numeros
            if ((Ord(substr($cuit, $i, 1)) >= 48) && (Ord(substr($cuit, $i, 1)) <= 57)) {
                $cuit_rearmado = $cuit_rearmado . substr($cuit, $i, 1);
            }
        }

        if (strlen($cuit_rearmado) <> 11) {  // si to estan todos los digitos
            $resultado = 0;
        } else {
            $sumador = 0;
            $verificador = substr($cuit_rearmado, 10, 1); //tomo el digito verificador

            for ($i = 0; $i <= 9; $i = $i + 1) {
                $sumador = $sumador + (substr($cuit_rearmado, $i, 1)) * $coeficiente[$i]; //separo cada digito y lo multiplico por el coeficiente
            }

            $resultado = $sumador % 11;
            $resultado = 11 - $resultado;  //saco el digito verificador
            $veri_nro = intval($verificador);

            if ($veri_nro <> $resultado) {
                return view('mensajes.cuitnovalido');
            } else {
                $cuit_rearmado = substr($cuit_rearmado, 0, 2) . "-" . substr($cuit_rearmado, 2, 8) . "-" . substr($cuit_rearmado, 10, 1);
            }
        }

        $empresas = Empresas::where('cuit', '=', $cuit)->get();
        $verificador = $empresas->count();

        if ($verificador) {
            return view('mensajes.empresaduplicada');
        } else {

            $datosEmpresa = request()->except('_token');

            Empresas::insert($datosEmpresa);

            return redirect('/listaempresas')->with('success', 'Empresa cargada con exito');
        }
    }
    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
        $id = Empresas::find($id);
        return view('usuarios.editarempresa', ['id' => $id]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(empresas $empresas)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //
        $datosEmpresa = request()->except(['_token', '_method', 'fecha_alta', 'pago', 'altauser']);
        Empresas::where('id', '=', $id)->update($datosEmpresa);

        return redirect('/listaempresas')->with('success', 'Empresa cargada con exito');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(empresas $empresas)
    {
        //
    }
}
