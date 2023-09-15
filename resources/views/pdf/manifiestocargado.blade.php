@foreach ($manifiesto as $datosManifiesto)

{{$numeroManifiesto = $datosManifiesto->id_manifiesto}}
{{$nombreGenerador = $datosManifiesto->nom_comp}}
{{$nombreTransporte = $datosManifiesto->id_transp}}
{{$nombreOperador = $datosManifiesto->gener_nom}}
{{$nombrePatente = $datosManifiesto->id_patente}}
{{$nombreChofer = $datosManifiesto->chofer}}

@endforeach

<?php

use App\Models\manifiestodet;
use App\Models\generador;
use App\Models\Transportista;
use App\Models\operadoralm;
use App\Models\vehiculos;
use App\Models\chofer;
use Carbon\Carbon;

$detalleManifiesto = manifiestodet::where('id_manifies', '=', $numeroManifiesto)->get();
$generador = generador::where('nom_comp', 'LIKE', '%' . $nombreGenerador . '%')->get();
$transporte = Transportista::where('id_transp', 'LIKE', '%' . $nombreTransporte . '%')->get();
$operador = operadoralm::where('gener_nom', 'LIKE', '%' . $nombreOperador . '%')->get();
$patente = vehiculos::where('id_patente', 'LIKE', '%' . $nombrePatente . '%')->get();
$chofer = chofer::where('chofer', 'LIKE', '%' . $nombreChofer . '%')->get();

$verificarDetalles = $detalleManifiesto->count();
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Gestion de residuos</title>

    <link rel="shortcat icon" href="{{ public_path('storage/imgPdf/logo.ico')}}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>


    <style>
        .cabeza {
            width: 100%;
            height: 15%;
            margin-top: -20px;
        }

        .tipeado {
            text-align: right;
            font-size: 11px;
            width: 50%;
            float: right;
            margin-top: 4%;
            font-family: Verdana, Geneva, Tahoma, sans-serif;
        }

        .logo {
            width: 30%;
            height: 100%;
            float: left;
        }

        .logoChubut {
            width: 100%;
            margin-top: 10%;
            height: 70%;
            padding: 2px;
        }

        .qr {
            width: 25%;
            height: 100%;
            float: left;
        }

        .elqr {
            width: 65%;
            height: 65%;
            margin-top: 12%;
            margin-left: 14%;
        }

        .tipeado2 {
            text-align: left;
            font-size: 16px;
            width: 40%;
            float: left;
            margin-left: 5%;
            margin-top: 9%;
            font-family: Verdana, Geneva, Tahoma, sans-serif;
            font-weight: bold;
        }

        td {
            font-size: 11px;
            padding: 2px;
            font-family: Verdana, Geneva, Tahoma, sans-serif;
        }

        .titulos {
            text-align: center;
        }

        th {
            font-size: 11px;
            padding: 1px;
            font-family: Verdana, Geneva, Tahoma, sans-serif;
        }

        .subtitulos {
            font-size: 10px;
        }

        .subtitulos2 {
            font-size: 9px;
        }

        .dataInvisible {
            color: white;
            border: solid 1px black;
        }

        .centrar {
            text-align: center;
        }

        .cuit {
            text-align: center;
        }

        .dividir {
            height: 5px;
        }
    </style>

</head>

<body>

    <!--------------------------LLAMADO A OTROS DATOS PARA EL PDF--------------------------------------->

    @foreach ($generador as $dataGenerador)
    @endforeach
    @foreach ($transporte as $dataTransporte)

    @endforeach
    @foreach ($operador as $dataOperador)

    @endforeach
    @foreach ($patente as $dataPatente)

    @endforeach
    @foreach ($chofer as $dataChofer)

    @endforeach



    <!--------------------------FINAL DEL LLAMADO A OTROS DATOS PARA EL PDF--------------------------------------->

    <div class="cabeza">
        <div class="logo">
            <img src="{{ public_path('storage/imgPdf/logochubut.png')}}" class="logoChubut" alt="Gobierno de Chubut">
        </div>

        <div class="qr">
            <img src="{{ public_path('storage/qr/'.$numeroManifiesto.'_manifiesto.png')}}" class="elqr" alt="QR">
        </div>

        <p class="tipeado">
            MANIFIESTO DE TRANSPORTE DE RESIDUOS PELIGROSOS <br><br>
            LEY XI N°35
        </p>
        <p class="tipeado2">
            N°: {{$numeroManifiesto}}
            <br><br>
            EMPRESA: {{$nombreTransporte}}
        </p>
    </div>

    <table class="table mt-10">
        <thead class="border-1">
            <tr>
                <th scope="col" colspan="6">1.DATOS IDENTIFICATORIOS</th>
            </tr>
        </thead>
        <tbody class="table-group-divider border-1">
            <tr class="border-1">
                <td scope="row"></td>
                <td colspan="2" class="border-1 titulos">DENOMINACIÓN</td>
                <td class="border-1 titulos">C.U.I.T</td>
                <td class="border-1 titulos">RPGyOSP N°</td>
                <td class="border-1 titulos">VIGENCIA</td>
            </tr>
            <tr class="border-1">

                <td class="border-1">GENERADOR</td>
                <td colspan="2" class="border-1">{{$dataGenerador->nom_comp}}</td>
                <td class="border-1 centrar cuit">{{$dataGenerador->cuit}}</td>
                <td class="border-1 centrar">{{$dataGenerador->cli_nro_hab_mun}}</td>
                <td class="border-1 centrar">{{$dataGenerador->cli_vto_hab_mun}}</td>
            </tr>
            <tr class="border-1">
                <td class="border-1">TRANSPORTISTAS</td>
                <td colspan="2" class="border-1">{{$dataTransporte->id_transp}}</td>
                <td class="border-1 centrar cuit">{{$dataTransporte->cuit_trans}}</td>
                <td class="border-1 centrar">{{$dataTransporte->trans_num_hab_mun}}</td>
                <td class="border-1 centrar">{{$dataTransporte->trans_vto_hab_mun}}</td>
            </tr>
            <tr class="border-1">
                <td class="border-1">OPERADOR</td>
                <td colspan="2" class="border-1">{{$dataOperador->gener_nom}}</td>
                <td class="border-1 centrar cuit">{{$dataOperador->gener_cuit}}</td>
                <td class="border-1 centrar">{{$dataOperador->gener_nro_hab_pro}}</td>
                <td class="border-1 centrar">{{$dataOperador->gener_vto_hab_pro}}</td>
            </tr>
        </tbody>

        <thead class="border-1">
            <tr>
                <th scope="col" colspan="6">2.TRANSPORTISTA</th>
            </tr>
        </thead>

        <tbody class="table-group-divider border-1">
            <tr class="border-1">
                <td colspan="2" class="border-1 titulos">VEHÍCULO</td>
                <td class="border-1 titulos">TIPO</td>
                <td class="border-1 titulos">DOMINIO</td>
                <td class="border-1 subtitulos2">N° REG. TRANS. CAR. PEL.</td>
                <td class="border-1 titulos">VIGENCIA</td>
            </tr>
            <tr class="border-1">
                <td colspan="2" class="border-1">{{$dataPatente->tipo_vehiculo}}</td>
                <td class="border-1">{{$dataPatente->descripcion_vehiculo}}</td>
                <td class="border-1 centrar">{{$dataPatente->id_patente}}</td>
                <td class="border-1 centrar">{{$dataPatente->pat_cpel_nro}}</td>
                <td class="border-1 centrar">{{$dataPatente->pat_cpel_vto}}</td>
            </tr>
            <tr class="border-1">
                <td class="border-1" colspan="3">CONDUCTOR: {{$dataChofer->chofer}}</td>
                <td class="border-1" colspan="2">LIC. MER. PELIG. CNRT N°: {{$dataChofer->nro_carnet}}</td>
                <td class="border-1 centrar">{{$dataChofer->carga_pelig_vto}}</td>
            </tr>
        </tbody>

        <thead class="border-1">
            <tr>
                <th scope="col" colspan="6">3.INFORMACIÓN DE RESIDUOS</th>
            </tr>
        </thead>

        <tbody class="table-group-divider border-1">
            <tr class="border-1">
                <td class="border-1 subtitulos2">TIPO CONTENEDOR</td>
                <td class="border-1 titulos">CANTIDAD</td>
                <td class="border-1 titulos">DESCRIPCIÓN</td>
                <td class="border-1 titulos">U.M.</td>
                <td class="border-1 titulos">ESTADO FÍSICO</td>
                <td class="border-1 titulos">CORRIENTE</td>
            </tr>

            <!---------------------------------SI TIENE 4 DETALLES------------------------------------->


            @foreach ($detalleManifiesto as $dataDetalles)

            <tr class="border-1">
                <td class="border-1 centrar">{{$dataDetalles->descr_ingreso}}</td>
                <td class="border-1 centrar">{{$dataDetalles->cantidad}}</td>
                <td class="border-1 subtitulos2">{{$dataDetalles->descripcion}}</td>
                <td class="border-1 centrar">{{$dataDetalles->um}}</td>
                <td class="border-1 centrar">{{$dataDetalles->estado}}</td>
                <td class="border-1 centrar">{{$dataDetalles->id_corrientes}}</td>
            </tr>

            @endforeach
            @if ($verificarDetalles == 1)
            <tr class="border-1">
                <td class="border-1 dataInvisible">Eso es invisible</td>
                <td class="border-1 dataInvisible">Eso es invisible</td>
                <td class="border-1 dataInvisible">Eso es invisible</td>
                <td class="border-1 dataInvisible">Eso es invisible</td>
                <td class="border-1 dataInvisible">Eso es invisible</td>
                <td class="border-1 dataInvisible">Eso es invisible</td>
            </tr>
            <tr class="border-1">
                <td class="border-1 dataInvisible">Eso es invisible</td>
                <td class="border-1 dataInvisible">Eso es invisible</td>
                <td class="border-1 dataInvisible">Eso es invisible</td>
                <td class="border-1 dataInvisible">Eso es invisible</td>
                <td class="border-1 dataInvisible">Eso es invisible</td>
                <td class="border-1 dataInvisible">Eso es invisible</td>
            </tr>
            <tr class="border-1">
                <td class="border-1 dataInvisible">Eso es invisible</td>
                <td class="border-1 dataInvisible">Eso es invisible</td>
                <td class="border-1 dataInvisible">Eso es invisible</td>
                <td class="border-1 dataInvisible">Eso es invisible</td>
                <td class="border-1 dataInvisible">Eso es invisible</td>
                <td class="border-1 dataInvisible">Eso es invisible</td>
            </tr>
            @elseif ($verificarDetalles == 2)
            <tr class="border-1">
                <td class="border-1 dataInvisible">Eso es invisible</td>
                <td class="border-1 dataInvisible">Eso es invisible</td>
                <td class="border-1 dataInvisible">Eso es invisible</td>
                <td class="border-1 dataInvisible">Eso es invisible</td>
                <td class="border-1 dataInvisible">Eso es invisible</td>
                <td class="border-1 dataInvisible">Eso es invisible</td>
            </tr>
            <tr class="border-1">
                <td class="border-1 dataInvisible">Eso es invisible</td>
                <td class="border-1 dataInvisible">Eso es invisible</td>
                <td class="border-1 dataInvisible">Eso es invisible</td>
                <td class="border-1 dataInvisible">Eso es invisible</td>
                <td class="border-1 dataInvisible">Eso es invisible</td>
                <td class="border-1 dataInvisible">Eso es invisible</td>
            </tr>
            @elseif ($verificarDetalles == 3)
            <tr class="border-1">
                <td class="border-1 dataInvisible">Eso es invisible</td>
                <td class="border-1 dataInvisible">Eso es invisible</td>
                <td class="border-1 dataInvisible">Eso es invisible</td>
                <td class="border-1 dataInvisible">Eso es invisible</td>
                <td class="border-1 dataInvisible">Eso es invisible</td>
                <td class="border-1 dataInvisible">Eso es invisible</td>
            </tr>
            @endif

        </tbody>

        <thead class="border-1">
            <tr>
                <th scope="col" colspan="6">4.INSTRUCCIONES DE MANIPULACIÓN PARA LOS TRANSPORTISTAS</th>
            </tr>
        </thead>


        <tbody class="table-group-divider border-1">
            <tr class="border-1">
                <td colspan="3" class="border-1">COMPONENTES Y CARACTERÍSTICAS PELIGROSAS - TOXICIDAD</td>
                <td colspan="3" class="border-1">SISTEMA DE IFENTIFICACIÓN DE PELIGROSIDAD</td>
            </tr>
            <tr class="border-1">
                <td class="border-1 titulos">INHALACIÓN</td>
                <td class="border-1 titulos">DÉRMICA</td>
                <td class="border-1 titulos">ORAL</td>
                <td class="border-1 subtitulos">INFLAMABILIDAD: {{$datosManifiesto->inflamabilidad}}</td>
                <td colspan="2" class="border-1 subtitulos2">REACTIVIDAD: {{$datosManifiesto->reactividad}}</td>
            </tr>
            <tr class="border-1">
                <td class="border-1 centrar">{{$datosManifiesto->inhalacion}}</td>
                <td class="border-1 centrar">{{$datosManifiesto->dermica}}</td>
                <td class="border-1 centrar">{{$datosManifiesto->oral}}</td>
                <td class="border-1 subtitulos">TOXICIDAD: {{$datosManifiesto->toxicidad}}</td>
                <td colspan="2" class="border-1 subtitulos">INSTRUCTIVOS: {{$datosManifiesto->inst_esp}}</td>
            </tr>
        </tbody>


        <thead class="border-1">
            <tr>
                <th scope="col" colspan="6">5.INSTRUCTIVOS</th>
            </tr>
        </thead>

        <tbody class="table-group-divider border-1">
            <tr class="border-1">
                <td colspan="4" class="border-1 subtitulos2">MANIPULACIÓN PARA EL OP. EN LA PLANTA DE TRATAMIENTO O EN EL SITIO DE DISP. TRANSIT./FINAL</td>
                <td class="border-1">SI (adj) | NO (no adj)</td>
                <td class="border-1 centrar">{{$datosManifiesto->manipulacion}}</td>
            </tr>
            <tr class="border-1">
                <td colspan="4" class="border-1">PLANES DE CONTINGENCIA</td>
                <td class="border-1">SI (adj) | NO (no adj)</td>
                <td class="border-1 centrar">{{$datosManifiesto->planes}}</td>
            </tr>
            <tr class="border-1">
                <td colspan="4" class="border-1">ROL DE EMERGENCIA - NÚMEROS DE CONTACTO</td>
                <td class="border-1">SI (adj) | NO (no adj)</td>
                <td class="border-1 centrar">{{$datosManifiesto->rol}}</td>
            </tr>
            <tr class="border-1">
                <td colspan="4" class="border-1">HOJA DE RUTA</td>
                <td class="border-1">SI (adj) | NO (no adj)</td>
                <td class="border-1 centrar">{{$datosManifiesto->hoja}}</td>
            </tr>
            <tr class="border-1">
                <td colspan="4" class="border-1">RUTAS ALTERNATIVAS</td>
                <td class="border-1">SI (adj) | NO (no adj)</td>
                <td class="border-1 centrar">{{$datosManifiesto->rutas}}</td>
            </tr>
        </tbody>

        <thead class="border-1">
            <tr>
                <th scope="col" colspan="6">6.CERTIFICACIONES
                </th>
            </tr>
        </thead>

        <tbody class="table-group-divider border-1">
            <tr class="border-1">
                <td class="border-1 titulos"></td>
                <td colspan="3" class="border-1 titulos">FIRMA</td>
                <td class="border-1 titulos">TÍTULO/CARGO</td>
                <td class="border-1 titulos">FECHA</td>
            </tr>
            <tr class="border-1">
                <td class="border-1">GENERADOR</td>
                <td colspan="3" class="border-1"></td>
                <td class="border-1"></td>
                <td class="border-1"></td>
            </tr>
            <tr class="border-1">
                <td class="border-1">TRANSPORTISTA</td>
                <td colspan="3" class="border-1"></td>
                <td class="border-1"></td>
                <td class="border-1"></td>
            </tr>
            <tr class="border-1">
                <td class="border-1">OPERADOR</td>
                <td colspan="3" class="border-1"></td>
                <td class="border-1"></td>
                <td class="border-1"></td>
            </tr>
        </tbody>

        <thead class="border-1">
            <tr>
                <th scope="col" colspan="6">7.DELARACIÓN JURADA: CERTIFICACIÓN DEL GENERADOR
                </th>
            </tr>
        </thead>

        <tbody class="table-group-divider border-1">
            <tr class="border-1">
                <td colspan="6" class="border-1 subtitulos">Declaro bajo juramento que la información y los datos manifestados
                    en la presente, son veraces y se ajustan a la legislación vigente de la materia.
                </td>
            </tr>
            <tr>
                <td colspan="4" class="border-1">FECHA Y SITIO DE RECOLECCIÓN: {{$datosManifiesto->fecha_alta_manif}} | {{$datosManifiesto->retiro_direc}}</td>
                <td colspan="2" class="subtitulos2">FECHA ENTREGA AL OPERADOR PERMAN/TRANSIT:</td>
            </tr>
            <tr>
                <td colspan="4" class="border-1">FIRMA:</td>
                <td colspan="2"></td>
            </tr>
            <tr>
                <td colspan="4" class="border-1">FECHA Y SITIO DE DESINFECCIÓN:</td>
                <td colspan="2"></td>
            </tr>
            <tr>
                <td colspan="4" class="border-1">FIRMA:</td>
                <td colspan="2"></td>
            </tr>
        </tbody>

        <thead>
            <tr>
                <th scope="col" colspan="6">VÁLIDO ÚNICAMENTE PARA TRANSPORTE DENTRO DE LA PROVINCIA DEL CHUBUT
                </th>
            </tr>
        </thead>


    </table>

</body>

</html>