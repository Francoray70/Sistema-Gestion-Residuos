<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

use App\Models\imagenesmanifiestos;
use App\Models\imagenesrpg;
use App\Models\manifiesto;
use App\Http\Controllers\Controller;
use App\Models\manifiestodet;
use Illuminate\Http\Request;

class ImagenesmanifiestosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $user = Auth::user();
        $userEmpresa = $user->empresa;
        $userRol = $user->rol_id;


        if ($userRol == '6') {

            $img = imagenesmanifiestos::all();
            return view('transportistas.listaimgmanifiestos', ['img' => $img]);
        } else {
            $img = imagenesmanifiestos::where('empresa', 'LIKE', '%' . $userEmpresa . '%')->get();

            $comprobar = $img->count();

            if ($comprobar) {
                return view('transportistas.listaimgmanifiestos', ['img' => $img]);
            } else {
                return redirect('/imagenesmanifiestostr');
            }
        }
    }
    public function indexrpg()
    {
        //
        $user = Auth::user();
        $userEmpresa = $user->empresa;
        $userRol = $user->rol_id;


        if ($userRol == '6') {

            $img = imagenesrpg::all();
            return view('opalmacenamiento.listaimagenesrpg', ['img' => $img]);
        } else {
            $img = imagenesrpg::where('empresa', 'LIKE', '%' . $userEmpresa . '%')->get();

            $comprobar = $img->count();

            if ($comprobar) {
                return view('opalmacenamiento.listaimagenesrpg', ['img' => $img]);
            } else {
                return redirect('/cargarimgrpg');
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

    public function imgManif($id)
    {
        //
        $id = imagenesmanifiestos::find($id);

        $comprobar = $id->count();

        if ($comprobar) {
            return view('transportistas.imgmanifiesto', compact('id'));
        } else {
            return view('mensajes.sinimagen');
        }
    }

    public function imgRpga($id)
    {
        //
        $id = imagenesrpg::find($id);

        $comprobar = $id->count();

        if ($comprobar) {
            return view('opalmacenamiento.imgrpg', compact('id'));
        } else {
            return view('mensajes.sinimagen');
        }
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $nmanif = $request->input('numero');
        $comprobar = manifiesto::where('id_manifiesto', '=', $nmanif)->get();
        $verificador = $comprobar->count();

        if ($verificador) {

            $datos = request()->except('_token');

            if ($request->hasFile('foto')) {
                $datos['foto'] = $request->file('foto')->store('manifiestos', 'public');
            }

            imagenesmanifiestos::insert($datos);

            return redirect('/listaimgmanifiestos')->with('success_message', 'Empresa cargada con exito');
        } else {
            return view('mensajes.sinmanifiesto');
        }
    }

    public function storeRpg(Request $request)
    {
        //
        $nmanif = $request->input('numero');
        $comprobar = manifiestodet::where('nro_cert_rpg', '=', $nmanif)
            ->get();
        $verificador = $comprobar->count();

        if ($verificador) {

            $datos = request()->except('_token');

            if ($request->hasFile('foto')) {
                $datos['foto'] = $request->file('foto')->store('rpg', 'public');
            }

            imagenesrpg::insert($datos);

            return redirect('/listaimgmanesrpg')->with('success_message', 'Empresa cargada con exito');
        } else {
            return view('mensajes.sinmanifiesto');
        }
    }
    /**
     * Display the specified resource.
     */
    public function show(imagenesmanifiestos $imagenesmanifiestos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(imagenesmanifiestos $imagenesmanifiestos)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, imagenesmanifiestos $imagenesmanifiestos)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(imagenesmanifiestos $imagenesmanifiestos)
    {
        //
    }
}
