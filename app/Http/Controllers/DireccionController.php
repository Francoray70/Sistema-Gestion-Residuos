<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\generador;
use App\Models\provincia;
use App\Models\direccion;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DireccionController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function traerDatos()
    {
        //
        $user = Auth::user();
        $userEmpresa = $user->empresa;
        $generador = generador::where('nom_comp', 'LIKE', '%' . $userEmpresa . '%')->get();
        $provincias = provincia::orderBy('provincia')->get();
        return view('generadores.direcciones', compact('generador', 'provincias'));
    }


    public function index()
    {
        //
        $user = Auth::user();
        $userEmpresa = $user->empresa;
        $userRol = $user->rol_id;

        if ($userRol == '6') {

            $direcciones = direccion::orderBy('nom_comp')->get();
            return view('generadores.listadirecciones', compact('direcciones'));
        } else {

            $direcciones = direccion::where('nom_comp', 'LIKE', '%' . $userEmpresa . '%')->get();

            return view('generadores.listadirecciones', ['direcciones' => $direcciones]);
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
        $datosDirecciones = request()->except('_token');

        direccion::insert($datosDirecciones);

        return redirect('/listadirecciones')->with('success_message', 'Direccion cargada con exito');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
        $provincias = provincia::orderBy('provincia')->get();
        $id = direccion::find($id);
        return view('generadores.editardirecciones', compact('provincias', 'id'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(direccion $direccion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //
        $datosDireccion = request()->except(['_token', '_method']);
        direccion::where('id', '=', $id)->update($datosDireccion);

        return redirect('/listadirecciones')->with('success_message', 'Direccion cargada con exito');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(direccion $direccion)
    {
        //
    }
}
