<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Empresas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegistroController extends Controller
{
    //
    public function CrearUsuario(Request $request)
    {
        $cuit = $request->input('cuit');
        $empresa = Empresas::where('cuit', '=', $cuit)->get();

        $verificar = $empresa->count();

        if ($verificar) {

            $mail = $request->input('email');
            $segundaveri = User::where('email', 'LIKE', '%' . $mail . '%')->get();

            $verificar2 = $segundaveri->count();

            if ($verificar2) {
                return view('mensajes.correoduplicado');
            } else {

                foreach ($empresa as $datosEmpresa) {
                    $empresaNombre = $datosEmpresa->nombre;
                    $empresaRol = $datosEmpresa->rol_id;
                    $empresaProvincia = $datosEmpresa->provincia;
                }

                $usuario = [
                    'usuario' => $request->input('cuit'),
                    'nombre' => $request->input('nombre'),
                    'apellido' => $request->input('apellido'),
                    'dni' => $request->input('dni'),
                    'cargo' => $request->input('cargo'),
                    'email' => $request->input('email'),
                    'rol_id' => $empresaRol,
                    'empresa' => $empresaNombre,
                    'provincia' => $empresaProvincia,
                    'baneado' => 'SI',
                    'token' => '',
                    'remember_token' => '',
                    'fecha_usu_alta' => $request->input('fecha'),
                    'fecha_usu_modi' => $request->input('fecha'),
                    'password' => Hash::make($request->input('password')),
                ];

                User::insert($usuario);

                return redirect('/');
            }
        } else {
            return view('mensajes.cuitnocompatible');
        }
    }
}
