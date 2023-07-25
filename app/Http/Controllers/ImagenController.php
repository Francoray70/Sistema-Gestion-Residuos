<?php

namespace App\Http\Controllers;

use App\Models\generador;
use App\Models\Transportista;
use App\Models\chofer;
use App\Models\vehiculos;
use App\Models\operadoralm;
use App\Models\operadordf;
use App\Http\Controllers\Controller;

class ImagenController extends Controller
{
    /**
     * ----------------------------------------------- IMAGENES DEL GENERADOR
     */


    public function imgProvincial($id)
    {
        //
        $id = generador::find($id);

        $comprobar = $id->count();

        if ($comprobar) {
            return view('generadores.imgprov', compact('id'));
        } else {
            return view('mensajes.sinimagen');
        }
    }
    public function imgNacional($id)
    {
        //
        $id = generador::find($id);

        return view('generadores.imgnac', compact('id'));
    }
    public function imgComercial($id)
    {
        //
        $id = generador::find($id);

        $comprobar = $id->count();

        if ($comprobar) {
            return view('generadores.imgcom', compact('id'));
        } else {
            return view('mensajes.sinimagen');
        }
    }
    /**
     * ----------------------------------------------- IMAGENES DEL TRANSPORTISTA
     */


    public function imgProvincialT($id)
    {
        //
        $id = Transportista::find($id);

        $comprobar = $id->count();

        if ($comprobar) {
            return view('transportistas.imgprov', compact('id'));
        } else {
            return view('mensajes.sinimagen');
        }
    }
    public function imgNacionalT($id)
    {
        //
        $id = Transportista::find($id);

        $comprobar = $id->count();

        if ($comprobar) {
            return view('transportistas.imgnac', compact('id'));
        } else {
            return view('mensajes.sinimagen');
        }
    }
    public function imgMunicipalT($id)
    {
        //
        $id = Transportista::find($id);

        $comprobar = $id->count();

        if ($comprobar) {
            return view('transportistas.imgmun', compact('id'));
        } else {
            return view('mensajes.sinimagen');
        }
    }
    /**
     * ----------------------------------------------- IMAGENES DEL CHOFER
     */


    public function imgcarnetCH($id)
    {
        //
        $id = chofer::find($id);

        $comprobar = $id->count();

        if ($comprobar) {
            return view('transportistas.imgcarnet', compact('id'));
        } else {
            return view('mensajes.sinimagen');
        }
    }
    public function imgcargapeligrosaCH($id)
    {
        //
        $id = chofer::find($id);

        $comprobar = $id->count();

        if ($comprobar) {
            return view('transportistas.imgcp', compact('id'));
        } else {
            return view('mensajes.sinimagen');
        }
    }
    public function imgsepCH($id)
    {
        //
        $id = chofer::find($id);

        $comprobar = $id->count();

        if ($comprobar) {
            return view('transportistas.imgsep', compact('id'));
        } else {
            return view('mensajes.sinimagen');
        }
    }
    /**
     * ----------------------------------------------- IMAGENES DEL VEHICULO
     */


    public function imgrutaVEH($id)
    {
        //
        $id = vehiculos::find($id);

        $comprobar = $id->count();

        if ($comprobar) {
            return view('transportistas.imgruta', compact('id'));
        } else {
            return view('mensajes.sinimagen');
        }
    }
    public function imgpropiedadVEH($id)
    {
        //
        $id = vehiculos::find($id);

        $comprobar = $id->count();

        if ($comprobar) {
            return view('transportistas.imgprop', compact('id'));
        } else {
            return view('mensajes.sinimagen');
        }
    }
    public function imgcedulaVEH($id)
    {
        //
        $id = vehiculos::find($id);

        $comprobar = $id->count();

        if ($comprobar) {
            return view('transportistas.imgced', compact('id'));
        } else {
            return view('mensajes.sinimagen');
        }
    }
    public function imgvtvVEH($id)
    {
        //
        $id = vehiculos::find($id);

        $comprobar = $id->count();

        if ($comprobar) {
            return view('transportistas.imgvtv', compact('id'));
        } else {
            return view('mensajes.sinimagen');
        }
    }
    public function imgcargapeligrosaVEH($id)
    {
        //
        $id = vehiculos::find($id);

        $comprobar = $id->count();

        if ($comprobar) {
            return view('transportistas.imgcpv', compact('id'));
        } else {
            return view('mensajes.sinimagen');
        }
    }
    /**
     * ----------------------------------------------- IMAGENES DEL OPERADOR DE ALMACENAMIENTO
     */


    public function imgProvincialOALM($id)
    {
        //
        $id = operadoralm::find($id);

        $comprobar = $id->count();

        if ($comprobar) {
            return view('opalmacenamiento.imgprov', compact('id'));
        } else {
            return view('mensajes.sinimagen');
        }
    }
    public function imgNacionalOALM($id)
    {
        //
        $id = operadoralm::find($id);

        $comprobar = $id->count();

        if ($comprobar) {
            return view('opalmacenamiento.imgnac', compact('id'));
        } else {
            return view('mensajes.sinimagen');
        }
    }
    public function imgMunicipalOALM($id)
    {
        //
        $id = operadoralm::find($id);

        $comprobar = $id->count();

        if ($comprobar) {
            return view('opalmacenamiento.imgmun', compact('id'));
        } else {
            return view('mensajes.sinimagen');
        }
    }
    /**
     * -----------------------------------------------IMAGENES DEL OPERADOR DE DISPOSICION FINAL
     */


    public function imgProvincialODF($id)
    {
        //
        $id = operadordf::find($id);

        $comprobar = $id->count();

        if ($comprobar) {
            return view('opdispfinal.imgprov', compact('id'));
        } else {
            return view('mensajes.sinimagen');
        }
    }
    public function imgNacionalODF($id)
    {
        //
        $id = operadordf::find($id);

        $comprobar = $id->count();

        if ($comprobar) {
            return view('opdispfinal.imgnac', compact('id'));
        } else {
            return view('mensajes.sinimagen');
        }
    }
    public function imgMunicipalODF($id)
    {
        //
        $id = operadordf::find($id);
        $comprobar = $id->count();

        if ($comprobar) {
            return view('opdispfinal.imgmun', compact('id'));
        } else {
            return view('mensajes.sinimagen');
        }
    }
}
