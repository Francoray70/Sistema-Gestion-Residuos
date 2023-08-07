<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use App\Models\Empresas;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'usuario' => ['required', 'string', 'max:255'],
            'nombre' => ['required', 'string', 'max:255'],
            'apellido' => ['required', 'string'],
            'dni' => ['required', 'string', 'max:255'],
            'cargo' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string'],
            'password' => ['required', 'string'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */

    protected function create(array $data)
    {
        $cuit = $data['cuit'];
        $empresa = Empresas::where('cuit', '=', $cuit)->get();

        $verificar = $empresa->count();

        if ($verificar) {
            foreach ($empresa as $datosEmpresa) {
                $empresaNombre = $datosEmpresa->nombre;
                $empresaRol = $datosEmpresa->rol_id;
                $empresaProvincia = $datosEmpresa->provincia;
            }

            return User::create([
                'usuario' => $data['cuit'],
                'nombre' => $data['nombre'],
                'apellido' => $data['apellido'],
                'dni' => $data['dni'],
                'cargo' => $data['cargo'],
                'email' => $data['email'],
                'password' => Hash::make($data['password']),
                'rol_id' => $empresaRol,
                'empresa' => $empresaNombre,
                'provincia' => $empresaProvincia,
                'fecha_usu_alta' => $data['fecha'],
                'fecha_usu_modi' => $data['fecha'],
            ]);
        } else {
            return view('mensajes.cuitnocompatible');
        }
    }
}
