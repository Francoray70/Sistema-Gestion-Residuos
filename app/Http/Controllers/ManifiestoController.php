<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\generador;
use App\Models\Transportista;
use App\Models\manifiestodet;
use App\Models\manifiesto;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class ManifiestoController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function traerDatos()
    {
        //
        $user = Auth::user();
        $userEmpresa = $user->empresa;
        $userid = $user->rol_id;
        $transporte = Transportista::where('id_transp', 'LIKE', '%' . $userEmpresa . '%')->first();

        if ($transporte) {
            $manifiestosRestantes = ($transporte->manifiesto_final) - ($transporte->manifiesto_actual);
            $generador = generador::all();
            $userRol = $user->rol_id;
            if ($userRol == '6') {
                $transportes = Transportista::orderBy('id_transp')->get();
                return view('transportistas.generarmanif', compact('transportes', 'generador'));
            } else {
                $transportes = Transportista::where('id_transp', 'LIKE', '%' . $userEmpresa . '%')->get();

                if ($manifiestosRestantes > 0) {
                    return view('transportistas.generarmanif', compact('transportes', 'generador'));
                } else {
                    return view('mensajes.comprarmanifiestos');
                }
            }
        } else {
            return view('mensajes.notransporte');
        }
    }

    public function traerCabecerapEditar(Request $request, $id)
    {
        //
        $user = Auth::user();
        $userEmpresa = $user->empresa;
        $manifiesto = manifiesto::where('id', '=', $id)
            ->where('estadoo', '=', 'INICIADO')
            ->get();
        $generador = generador::all();
        $transporte = Transportista::where('id_transp', 'LIKE', '%' . $userEmpresa . '%')->get();

        $comprobar = $manifiesto->count();

        if ($comprobar) {
            return view('transportistas.editarcabecera', compact('manifiesto', 'generador', 'transporte'));
        } else {
            return view('mensajes.manifiestonoeditable');
        }
    }

    public function index()
    {
        //
        $user = Auth::user();
        $userEmpresa = $user->empresa;
        $userid = $user->rol_id;

        if ($userid == '6') {
            $manifiesto = manifiesto::all();

            return view('transportistas.listacabeceras', compact('manifiesto'));
        } else {
            $manifiesto = manifiesto::where('id_transp', 'LIKE', '%' . $userEmpresa . '%')
                ->orderBy('fecha_alta_manif', 'desc')
                ->get();

            return view('transportistas.listacabeceras', ['manifiesto' => $manifiesto]);
        }
    }

    public function paraImprimir()
    {
        //
        $user = Auth::user();
        $userEmpresa = $user->empresa;
        $userid = $user->rol_id;

        if ($userid == '6') {
            $manifiesto = manifiesto::orderBy('fecha_alta_manif', 'desc')
                ->get();

            return view('transportistas.reimprimirpdf', compact('manifiesto'));
        } else {
            $manifiesto = manifiesto::where('id_transp', 'LIKE', '%' . $userEmpresa . '%')
                ->orderBy('fecha_alta_manif', 'desc')
                ->get();

            return view('transportistas.reimprimirpdf', ['manifiesto' => $manifiesto]);
        }
    }

    public function reimpresionpdf(Request $request)
    {
        //
        $manifi = $request->input('manifiesto');
        $manifiesto = manifiesto::where('id_manifiesto', '=', $manifi)->get();

        return view('transportistas.pdfreimpreso', compact('manifiesto'));
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
    //  */

    //-------------------------------------------------------------- INICIO DE CONTROLADOR PARA MANIFIESTO ONLINE -----------------

    // public function store(Request $request)
    // {
    //     //
    //     $numeroManifiesto = $request->input('manifiesto');

    //     $manifiestodoble = manifiesto::where('id_manifiesto', '=', $numeroManifiesto)->get();
    //     $control = $manifiestodoble->count();
    //     if ($control > 0) {
    //         return view('mensajes.manifiestoexistente');
    //     } else {

    //         $datosCabecera = [
    //             'id_manifiesto' => $numeroManifiesto,
    //             'id_transp' => $request->input('transporte'),
    //             'nom_comp' => $request->input('generador'),
    //             'fecha_alta_manif' => $request->input('fecha'),
    //             'chofer' => $request->input('chofer'),
    //             'id_patente' => $request->input('patente'),
    //             'retiro_direc' => $request->input('direccion'),
    //             'gener_nom' => $request->input('operador'),
    //             'inhalacion' => $request->input('inhalacion'),
    //             'dermica' => $request->input('dermica'),
    //             'oral' => $request->input('oral'),
    //             'inflamabilidad' => $request->input('inflamabilidad'),
    //             'reactividad' => $request->input('reactividad'),
    //             'toxicidad' => $request->input('toxicidad'),
    //             'inst_esp' => $request->input('inst_esp'),
    //             'manipulacion' => $request->input('manipulacion'),
    //             'planes' => $request->input('planes'),
    //             'rol' => $request->input('rol'),
    //             'hoja' => $request->input('hoja'),
    //             'rutas' => $request->input('rutas'),
    //             'simple_multiple' => $request->input('tipo'),
    //             'estadoo' => 'INICIADO',
    //             'fecha_modi_manif' => $request->input('fecha'),
    //             'useralta' => $request->input('idusuario'),
    //             'fecha_autorizacion' => $request->input('fecha'),
    //             'updated_at' => $request->input('fecha'),
    //         ];

    //         if ($request->input('cantidad') == '') {
    //             $cantidad = '';
    //         } else {
    //             $cantidad = $request->input('cantidad');
    //         }

    //         $datosDetalles = [
    //             'id_manifies' => $numeroManifiesto,
    //             'id_transpo' => $request->input('transporte'),
    //             'id_corrientes' => $request->input('corriente'),
    //             'um' => $request->input('um'),
    //             'cantidad' => $cantidad,
    //             'descr_ingreso' => $request->input('descr_ingreso'),
    //             'estado_det_manif' => $request->input('tipo2'),
    //             'estado' => $request->input('estado'),
    //             'descripcion' => $request->input('descripcion'),
    //             'simp_multi' => $request->input('tipo'),
    //             'estadooo' => 'INICIADO',
    //             'useralta' => $request->input('idusuario'),
    //             'id_man_tra_nac' => '',
    //             'nro_cert_disp_final' => '',
    //             'rpg' => '',
    //             'nro_cert_rpg' => '',
    //             'fcha_entr_cdf' => $request->input('fecha'),
    //             'fcha_entr_cdf' => $request->input('fecha'),
    //             'updated_at' => $request->input('fecha'),
    //         ];

    //         manifiesto::insert($datosCabecera);
    //         manifiestodet::insert($datosDetalles);

    //         if ($request->input('corriente1')) {


    //             if ($request->input('cantidad1') == '') {
    //                 $cantidad1 = '';
    //             } else {
    //                 $cantidad1 = $request->input('cantidad1');
    //             }

    //             $datosDetalles1 = [
    //                 'id_manifies' => $numeroManifiesto,
    //                 'id_transpo' => $request->input('transporte'),
    //                 'id_corrientes' => $request->input('corriente1'),
    //                 'um' => $request->input('um1'),
    //                 'cantidad' => $cantidad1,
    //                 'descr_ingreso' => $request->input('descr_ingreso1'),
    //                 'estado_det_manif' => $request->input('tipo2'),
    //                 'estado' => $request->input('estado'),
    //                 'descripcion' => $request->input('descripcion1'),
    //                 'simp_multi' => $request->input('tipo'),
    //                 'estadooo' => 'INICIADO',
    //                 'useralta' => $request->input('idusuario'),
    //                 'id_man_tra_nac' => '',
    //                 'nro_cert_disp_final' => '',
    //                 'rpg' => '',
    //                 'nro_cert_rpg' => '',
    //                 'fcha_entr_cdf' => $request->input('fecha'),
    //                 'fcha_entr_cdf' => $request->input('fecha'),
    //                 'updated_at' => $request->input('fecha'),
    //             ];

    //             if ($datosDetalles1) {
    //                 manifiestodet::insert($datosDetalles1);
    //             }
    //         }

    //         if ($request->input('corriente2')) {


    //             if ($request->input('cantidad2') == '') {
    //                 $cantidad2 = '';
    //             } else {
    //                 $cantidad2 = $request->input('cantidad2');
    //             }

    //             $datosDetalles2 = [
    //                 'id_manifies' => $numeroManifiesto,
    //                 'id_transpo' => $request->input('transporte'),
    //                 'id_corrientes' => $request->input('corriente2'),
    //                 'um' => $request->input('um2'),
    //                 'cantidad' => $cantidad2,
    //                 'descr_ingreso' => $request->input('descr_ingreso2'),
    //                 'estado_det_manif' => $request->input('tipo2'),
    //                 'estado' => $request->input('estado2'),
    //                 'descripcion' => $request->input('descripcion2'),
    //                 'simp_multi' => $request->input('tipo'),
    //                 'estadooo' => 'INICIADO',
    //                 'useralta' => $request->input('idusuario'),
    //                 'id_man_tra_nac' => '',
    //                 'nro_cert_disp_final' => '',
    //                 'rpg' => '',
    //                 'nro_cert_rpg' => '',
    //                 'fcha_entr_cdf' => $request->input('fecha'),
    //                 'fcha_entr_cdf' => $request->input('fecha'),
    //                 'updated_at' => $request->input('fecha'),
    //             ];

    //             if ($datosDetalles2) {
    //                 manifiestodet::insert($datosDetalles2);
    //             }
    //         }
    //         if ($request->input('corriente3')) {


    //             if ($request->input('cantidad3') == '') {
    //                 $cantidad3 = '';
    //             } else {
    //                 $cantidad3 = $request->input('cantidad3');
    //             }

    //             $datosDetalles3 = [
    //                 'id_manifies' => $numeroManifiesto,
    //                 'id_transpo' => $request->input('transporte'),
    //                 'id_corrientes' => $request->input('corriente3'),
    //                 'um' => $request->input('um3'),
    //                 'cantidad' => $cantidad3,
    //                 'descr_ingreso' => $request->input('descr_ingreso3'),
    //                 'estado_det_manif' => $request->input('tipo2'),
    //                 'estado' => $request->input('estado3'),
    //                 'descripcion' => $request->input('descripcion3'),
    //                 'simp_multi' => $request->input('tipo'),
    //                 'estadooo' => 'INICIADO',
    //                 'useralta' => $request->input('idusuario'),
    //                 'id_man_tra_nac' => '',
    //                 'nro_cert_disp_final' => '',
    //                 'rpg' => '',
    //                 'nro_cert_rpg' => '',
    //                 'fcha_entr_cdf' => $request->input('fecha'),
    //                 'fcha_entr_cdf' => $request->input('fecha'),
    //                 'updated_at' => $request->input('fecha'),
    //             ];

    //             if ($datosDetalles3) {
    //                 manifiestodet::insert($datosDetalles3);
    //             }
    //         }


    //         $user = Auth::user();
    //         $userEmpresa = $user->empresa;
    //         $nuevoManifiesto = [
    //             'manifiesto_actual' => $request->input('nuevomanifiesto'),
    //         ];
    //         Transportista::where('id_transp', 'LIKE', '%' . $userEmpresa . '%')->update($nuevoManifiesto);

    //         $manifiesto = manifiesto::where('id_manifiesto', '=', $numeroManifiesto)->get();

    //         $pdf = PDF::loadView('pdf.manifiestonuevo', compact('manifiesto'));
    //         return $pdf->download($numeroManifiesto . '.pdf');
    //     }
    // }
    //-------------------------------------------------------------- FIN CARGA MANIFIESTO ONLINE --------------------------------

    public function storeOff(Request $request)
    {
        //
        $manif1 = $request->input('manifiesto');
        $manif2 = $request->input('manifiesto2');
        $tipo = $request->input('tipo');
        $numeroManifiesto = $manif1 . $manif2;

        $verificarManifiesto = manifiesto::where('id_manifiesto', '=', $numeroManifiesto)->get();
        $comprobar = $verificarManifiesto->count();

        if ($comprobar) {
            return view('mensajes.manifiestoexistente');
        } else {

            if ($tipo == 'VARIOS') {

                if ($request->input('cantidad') == '' || $request->input('descr_ingreso') == '') {
                    return view('mensajes.relleneDetalle');
                } else {

                    $datosCabecera = [
                        'id_manifiesto' => $numeroManifiesto,
                        'id_transp' => $request->input('transporte'),
                        'nom_comp' => $request->input('generador'),
                        'fecha_alta_manif' => $request->input('fechaNueva'),
                        'chofer' => $request->input('chofer'),
                        'id_patente' => $request->input('patente'),
                        'retiro_direc' => $request->input('direccion'),
                        'gener_nom' => $request->input('operador'),
                        'inhalacion' => $request->input('inhalacion'),
                        'dermica' => $request->input('dermica'),
                        'oral' => $request->input('oral'),
                        'inflamabilidad' => $request->input('inflamabilidad'),
                        'reactividad' => $request->input('reactividad'),
                        'toxicidad' => $request->input('toxicidad'),
                        'inst_esp' => $request->input('inst_esp'),
                        'manipulacion' => $request->input('manipulacion'),
                        'planes' => $request->input('planes'),
                        'rol' => $request->input('rol'),
                        'hoja' => $request->input('hoja'),
                        'rutas' => $request->input('rutas'),
                        'simple_multiple' => $request->input('tipo'),
                        'estadoo' => 'INICIADO',
                        'fecha_modi_manif' => $request->input('fechaNueva'),
                        'useralta' => $request->input('idusuario'),
                        'fecha_autorizacion' => $request->input('fechaNueva'),
                        'updated_at' => $request->input('fechaNueva'),
                    ];

                    $datosDetalles = [
                        'id_manifies' => $numeroManifiesto,
                        'id_transpo' => $request->input('transporte'),
                        'id_corrientes' => $request->input('corriente'),
                        'um' => $request->input('um'),
                        'cantidad' => $request->input('cantidad'),
                        'descr_ingreso' => $request->input('descr_ingreso'),
                        'estado_det_manif' => $request->input('tipo2'),
                        'estado' => $request->input('estado'),
                        'descripcion' => $request->input('descripcion'),
                        'simp_multi' => $request->input('tipo'),
                        'estadooo' => 'INICIADO',
                        'useralta' => $request->input('idusuario'),
                        'id_man_tra_nac' => '',
                        'nro_cert_disp_final' => '',
                        'rpg' => '',
                        'nro_cert_rpg' => '',
                        'fcha_entr_cdf' => $request->input('fechaNueva'),
                        'fcha_entr_cdf' => $request->input('fechaNueva'),
                        'updated_at' => $request->input('fechaNueva'),
                    ];

                    manifiesto::insert($datosCabecera);
                    manifiestodet::insert($datosDetalles);
                }

                if ($request->input('corriente1')) {

                    if ($request->input('cantidad1') == '' || $request->input('descr_ingreso1') == '') {
                        return view('mensajes.relleneDetalle');
                    } else {

                        $datosDetalles1 = [
                            'id_manifies' => $numeroManifiesto,
                            'id_transpo' => $request->input('transporte'),
                            'id_corrientes' => $request->input('corriente1'),
                            'um' => $request->input('um1'),
                            'cantidad' => $request->input('cantidad1'),
                            'descr_ingreso' => $request->input('descr_ingreso1'),
                            'estado_det_manif' => $request->input('tipo2'),
                            'estado' => $request->input('estado'),
                            'descripcion' => $request->input('descripcion1'),
                            'simp_multi' => $request->input('tipo'),
                            'estadooo' => 'INICIADO',
                            'useralta' => $request->input('idusuario'),
                            'id_man_tra_nac' => '',
                            'nro_cert_disp_final' => '',
                            'rpg' => '',
                            'nro_cert_rpg' => '',
                            'fcha_entr_cdf' => $request->input('fechaNueva'),
                            'fcha_entr_cdf' => $request->input('fechaNueva'),
                            'updated_at' => $request->input('fechaNueva'),
                        ];

                        if ($datosDetalles1) {
                            manifiestodet::insert($datosDetalles1);
                        }
                    }
                }

                if ($request->input('corriente2')) {

                    if ($request->input('cantidad2') == '' || $request->input('descr_ingreso2') == '') {
                        return view('mensajes.relleneDetalle');
                    } else {

                        $datosDetalles2 = [
                            'id_manifies' => $numeroManifiesto,
                            'id_transpo' => $request->input('transporte'),
                            'id_corrientes' => $request->input('corriente2'),
                            'um' => $request->input('um2'),
                            'cantidad' => $request->input('cantidad2'),
                            'descr_ingreso' => $request->input('descr_ingreso2'),
                            'estado_det_manif' => $request->input('tipo2'),
                            'estado' => $request->input('estado2'),
                            'descripcion' => $request->input('descripcion2'),
                            'simp_multi' => $request->input('tipo'),
                            'estadooo' => 'INICIADO',
                            'useralta' => $request->input('idusuario'),
                            'id_man_tra_nac' => '',
                            'nro_cert_disp_final' => '',
                            'rpg' => '',
                            'nro_cert_rpg' => '',
                            'fcha_entr_cdf' => $request->input('fechaNueva'),
                            'fcha_entr_cdf' => $request->input('fechaNueva'),
                            'updated_at' => $request->input('fechaNueva'),
                        ];

                        if ($datosDetalles2) {
                            manifiestodet::insert($datosDetalles2);
                        }
                    }
                }


                if ($request->input('corriente3')) {


                    if ($request->input('cantidad3') == '' || $request->input('descr_ingreso3') == '') {
                        return view('mensajes.relleneDetalle');
                    } else {

                        $datosDetalles3 = [
                            'id_manifies' => $numeroManifiesto,
                            'id_transpo' => $request->input('transporte'),
                            'id_corrientes' => $request->input('corriente3'),
                            'um' => $request->input('um3'),
                            'cantidad' => $request->input('cantidad3'),
                            'descr_ingreso' => $request->input('descr_ingreso3'),
                            'estado_det_manif' => $request->input('tipo2'),
                            'estado' => $request->input('estado3'),
                            'descripcion' => $request->input('descripcion3'),
                            'simp_multi' => $request->input('tipo'),
                            'estadooo' => 'INICIADO',
                            'useralta' => $request->input('idusuario'),
                            'id_man_tra_nac' => '',
                            'nro_cert_disp_final' => '',
                            'rpg' => '',
                            'nro_cert_rpg' => '',
                            'fcha_entr_cdf' => $request->input('fechaNueva'),
                            'fcha_entr_cdf' => $request->input('fechaNueva'),
                            'updated_at' => $request->input('fechaNueva'),
                        ];

                        if ($datosDetalles3) {
                            manifiestodet::insert($datosDetalles3);
                        }
                    }
                }

                $user = Auth::user();
                $userEmpresa = $user->empresa;
                $nuevoManifiesto = [
                    'manifiesto_actual' => $request->input('nuevomanifiesto'),
                ];

                Transportista::where('id_transp', 'LIKE', '%' . $userEmpresa . '%')->update($nuevoManifiesto);


                return redirect('/listacabeceras')->with('success_message', 'Empresa cargada con exito');
            } else {

                $datosCabecera = [
                    'id_manifiesto' => $numeroManifiesto,
                    'id_transp' => $request->input('transporte'),
                    'nom_comp' => $request->input('generador'),
                    'fecha_alta_manif' => $request->input('fechaNueva'),
                    'chofer' => $request->input('chofer'),
                    'id_patente' => $request->input('patente'),
                    'retiro_direc' => $request->input('direccion'),
                    'gener_nom' => $request->input('operador'),
                    'inhalacion' => $request->input('inhalacion'),
                    'dermica' => $request->input('dermica'),
                    'oral' => $request->input('oral'),
                    'inflamabilidad' => $request->input('inflamabilidad'),
                    'reactividad' => $request->input('reactividad'),
                    'toxicidad' => $request->input('toxicidad'),
                    'inst_esp' => $request->input('inst_esp'),
                    'manipulacion' => $request->input('manipulacion'),
                    'planes' => $request->input('planes'),
                    'rol' => $request->input('rol'),
                    'hoja' => $request->input('hoja'),
                    'rutas' => $request->input('rutas'),
                    'simple_multiple' => $request->input('tipo'),
                    'estadoo' => 'INICIADO',
                    'fecha_modi_manif' => $request->input('fechaNueva'),
                    'useralta' => $request->input('idusuario'),
                    'fecha_autorizacion' => $request->input('fechaNueva'),
                    'updated_at' => $request->input('fechaNueva'),
                ];

                if ($request->input('cantidad') == '') {
                    $cantidad = '';
                } else {
                    $cantidad = $request->input('cantidad');
                }

                if ($request->input('descr_ingreso') == '') {
                    $descripcion = '';
                } else {
                    $descripcion = $request->input('descr_ingreso');
                }

                $datosDetalles = [
                    'id_manifies' => $numeroManifiesto,
                    'id_transpo' => $request->input('transporte'),
                    'id_corrientes' => $request->input('corriente'),
                    'um' => $request->input('um'),
                    'cantidad' => $cantidad,
                    'descr_ingreso' => $descripcion,
                    'estado_det_manif' => $request->input('tipo2'),
                    'estado' => $request->input('estado'),
                    'descripcion' => $request->input('descripcion'),
                    'simp_multi' => $request->input('tipo'),
                    'estadooo' => 'INICIADO',
                    'useralta' => $request->input('idusuario'),
                    'id_man_tra_nac' => '',
                    'nro_cert_disp_final' => '',
                    'rpg' => '',
                    'nro_cert_rpg' => '',
                    'fcha_entr_cdf' => $request->input('fechaNueva'),
                    'fcha_entr_cdf' => $request->input('fechaNueva'),
                    'updated_at' => $request->input('fechaNueva'),
                ];

                manifiesto::insert($datosCabecera);
                manifiestodet::insert($datosDetalles);

                if ($request->input('corriente1')) {

                    if ($request->input('cantidad1') == '') {
                        $cantidad1 = '';
                    } else {
                        $cantidad1 = $request->input('cantidad1');
                    }

                    if ($request->input('descr_ingreso1') == '') {
                        $descripcion1 = '';
                    } else {
                        $descripcion1 = $request->input('descr_ingreso1');
                    }

                    $datosDetalles1 = [
                        'id_manifies' => $numeroManifiesto,
                        'id_transpo' => $request->input('transporte'),
                        'id_corrientes' => $request->input('corriente1'),
                        'um' => $request->input('um1'),
                        'cantidad' => $cantidad1,
                        'descr_ingreso' => $descripcion1,
                        'estado_det_manif' => $request->input('tipo2'),
                        'estado' => $request->input('estado'),
                        'descripcion' => $request->input('descripcion1'),
                        'simp_multi' => $request->input('tipo'),
                        'estadooo' => 'INICIADO',
                        'useralta' => $request->input('idusuario'),
                        'id_man_tra_nac' => '',
                        'nro_cert_disp_final' => '',
                        'rpg' => '',
                        'nro_cert_rpg' => '',
                        'fcha_entr_cdf' => $request->input('fechaNueva'),
                        'fcha_entr_cdf' => $request->input('fechaNueva'),
                        'updated_at' => $request->input('fechaNueva'),
                    ];

                    if ($datosDetalles1) {
                        manifiestodet::insert($datosDetalles1);
                    }
                }

                if ($request->input('corriente2')) {

                    if ($request->input('cantidad2') == '') {
                        $cantidad2 = '';
                    } else {
                        $cantidad2 = $request->input('cantidad2');
                    }

                    if ($request->input('descr_ingreso2') == '') {
                        $descripcion2 = '';
                    } else {
                        $descripcion2 = $request->input('descr_ingreso2');
                    }

                    $datosDetalles2 = [
                        'id_manifies' => $numeroManifiesto,
                        'id_transpo' => $request->input('transporte'),
                        'id_corrientes' => $request->input('corriente2'),
                        'um' => $request->input('um2'),
                        'cantidad' => $cantidad2,
                        'descr_ingreso' => $descripcion2,
                        'estado_det_manif' => $request->input('tipo2'),
                        'estado' => $request->input('estado2'),
                        'descripcion' => $request->input('descripcion2'),
                        'simp_multi' => $request->input('tipo'),
                        'estadooo' => 'INICIADO',
                        'useralta' => $request->input('idusuario'),
                        'id_man_tra_nac' => '',
                        'nro_cert_disp_final' => '',
                        'rpg' => '',
                        'nro_cert_rpg' => '',
                        'fcha_entr_cdf' => $request->input('fechaNueva'),
                        'fcha_entr_cdf' => $request->input('fechaNueva'),
                        'updated_at' => $request->input('fechaNueva'),
                    ];

                    if ($datosDetalles2) {
                        manifiestodet::insert($datosDetalles2);
                    }
                }
                if ($request->input('corriente3')) {

                    if ($request->input('cantidad3') == '') {
                        $cantidad3 = '';
                    } else {
                        $cantidad3 = $request->input('cantidad3');
                    }

                    if ($request->input('descr_ingreso3') == '') {
                        $descripcion3 = '';
                    } else {
                        $descripcion3 = $request->input('descr_ingreso3');
                    }

                    $datosDetalles3 = [
                        'id_manifies' => $numeroManifiesto,
                        'id_transpo' => $request->input('transporte'),
                        'id_corrientes' => $request->input('corriente3'),
                        'um' => $request->input('um3'),
                        'cantidad' => $cantidad3,
                        'descr_ingreso' => $descripcion3,
                        'estado_det_manif' => $request->input('tipo2'),
                        'estado' => $request->input('estado3'),
                        'descripcion' => $request->input('descripcion3'),
                        'simp_multi' => $request->input('tipo'),
                        'estadooo' => 'INICIADO',
                        'useralta' => $request->input('idusuario'),
                        'id_man_tra_nac' => '',
                        'nro_cert_disp_final' => '',
                        'rpg' => '',
                        'nro_cert_rpg' => '',
                        'fcha_entr_cdf' => $request->input('fechaNueva'),
                        'fcha_entr_cdf' => $request->input('fechaNueva'),
                        'updated_at' => $request->input('fechaNueva'),
                    ];

                    if ($datosDetalles3) {
                        manifiestodet::insert($datosDetalles3);
                    }
                }

                $user = Auth::user();
                $userEmpresa = $user->empresa;
                $nuevoManifiesto = [
                    'manifiesto_actual' => $request->input('nuevomanifiesto'),
                ];

                Transportista::where('id_transp', 'LIKE', '%' . $userEmpresa . '%')->update($nuevoManifiesto);


                return redirect('/listacabeceras')->with('success_message', 'Empresa cargada con exito');
            }
        }
    }
    /**
     * Display the specified resource.
     */
    public function show(manifiesto $manifiesto)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(manifiesto $manifiesto)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function editarCabeceraManifiesto(Request $request)
    {
        //
        $datosCabecera = [
            'id_manifiesto' => $request->input('manifiesto'),
            'id_transp' => $request->input('transporte'),
            'nom_comp' => $request->input('generador'),
            'fecha_alta_manif' => $request->input('fecha_alta'),
            'chofer' => $request->input('chofer'),
            'id_patente' => $request->input('patente'),
            'retiro_direc' => $request->input('direccion'),
            'gener_nom' => $request->input('operador'),
            'inhalacion' => $request->input('inhalacion'),
            'dermica' => $request->input('dermica'),
            'oral' => $request->input('oral'),
            'inflamabilidad' => $request->input('inflamabilidad'),
            'reactividad' => $request->input('reactividad'),
            'toxicidad' => $request->input('toxicidad'),
            'inst_esp' => $request->input('inst_esp'),
            'manipulacion' => $request->input('manipulacion'),
            'planes' => $request->input('planes'),
            'rol' => $request->input('rol'),
            'hoja' => $request->input('hoja'),
            'rutas' => $request->input('rutas'),
            'simple_multiple' => $request->input('tipo'),
            'estadoo' => 'INICIADO',
            'fecha_modi_manif' => $request->input('fecha'),
            'updated_at' => $request->input('fecha'),
        ];

        manifiesto::where('id_manifiesto', '=', $request->input('manifiesto'))->update($datosCabecera);

        return redirect('/listacabeceras');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(manifiesto $manifiesto)
    {
        //
    }
}
