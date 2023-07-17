<?php

namespace App\Http\Controllers;

use App\Models\manifiestodet;
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
