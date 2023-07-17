<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\Controller;
use App\Models\Empresas;
use App\Models\Transportista;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = Auth::user();
        $userEmpresa = $user->empresa;
        $empresa = Empresas::all();
        $transporte = Transportista::where('id_transp', 'LIKE', '%' . $userEmpresa . '%')->first();
        if ($transporte) {
            $maniActual = $transporte->manifiesto_actual;
            $maniFinal = $transporte->manifiesto_final;
            $maniInicial = $transporte->manifiesto_inicial;

            $manifiestoRestanteNumero = $maniFinal - $maniActual;

            $maniFinal = $maniFinal - $maniInicial;
            $maniActual = $maniActual - $maniInicial;

            $manifiestosRestantes = ($maniActual * 100) / $maniFinal;
            $manifiestosRestantes = number_format($manifiestosRestantes, 1);
            return view('home', compact('empresa', 'manifiestosRestantes', 'manifiestoRestanteNumero'));
        } else {
            return view('home');
        }
    }

    public function update(Request $request, $id)
    {

        $datosEmpresa = request()->except(['_token', '_method']);

        Empresas::where('id', '=', $id)->update($datosEmpresa);

        return redirect('/home')->with('success_message', 'Empresa cargada con exito');
    }
}
