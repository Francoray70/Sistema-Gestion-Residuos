@foreach ($certificado as $dataCertificado)
{{$numeroCertificado = $dataCertificado->nro_cert_disp_final}}
{{$numeroManifiesto = $dataCertificado->num_manifiesto}}
{{$nombreGenerador = $dataCertificado->generador}}
{{$nombreOperador = $dataCertificado->opdfinal}}
@endforeach
<?php

use App\Models\certificadodetalle;
use App\Models\generador;
use App\Models\operadordf;
use Carbon\Carbon;

$dataDetalle = certificadodetalle::where('numero_certif', '=', $numeroCertificado)->get();
$dataGenerador = generador::where('nom_comp', 'LIKE', '%' . $nombreGenerador . '%')->get();
$dataOperador = operadordf::where('id_operador_df', 'LIKE', '%' . $nombreOperador . '%')->get();
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Gestion de residuos</title>

    <link rel="shortcat icon" href="{{public_path('imgPdf/logo.ico')}}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>

    <style>
        .cabeza {
            width: 100%;
            height: 15%;
        }

        .tipeado {
            text-align: center;
            font-size: 50px;
            width: 90%;
            margin-left: 5%;
            font-family: Verdana, Geneva, Tahoma, sans-serif;
        }

        h2 {
            margin-top: 3%;
            font-size: 30px;
            font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
        }

        p {
            font-size: 30px;
        }

        .dataGenerador {
            width: 49%;
            height: 40%;
            float: left;
            font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
            border: 1px solid black;
            padding: 8px;
        }

        .dataOperador {
            width: 49%;
            height: 40%;
            float: left;
            font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
            border: 1px solid black;
            padding: 8px;
        }

        .detalle {
            width: 100%;
            height: 20%;
            margin-top: 30%;
        }

        tr {
            border: 1px solid black;
        }

        .lostitulos {
            text-align: center;
            font-size: 25px;
            border: 1px solid black;
            padding: 10px;
            font-weight: bold;
        }

        .losSubtitulos {
            text-align: center;
            font-size: 22px;
            border: 1px solid black;
            padding: 5px;
        }

        .losDatos {
            text-align: center;
            font-size: 22px;
        }
    </style>

</head>

<body>

    <!--------------------------LLAMADO A OTROS DATOS PARA EL PDF--------------------------------------->

    @foreach ($dataGenerador as $datosGenerador)

    @endforeach
    @foreach ($dataOperador as $datosOperador)

    @endforeach

    <!--------------------------FINAL DEL LLAMADO A OTROS DATOS PARA EL PDF--------------------------------------->

    <div class="cabeza">

        <p class="tipeado">
            CERTIFICADO DE TRATAMIENTO / DISPOSICIÓN FINAL <br>
            RESIDUOS PELIGROSOS N°: {{$numeroCertificado}} <br>
            LEY XI N°35
        </p>
    </div>

    <div class="dataGenerador">
        <h2>DATOS DEL GENERADOR</h2>

        <br><br>

        <p>Razón Social: {{$datosGenerador->nom_comp}}</p>
        <br>
        <p>Domicilio: {{$datosGenerador->direccion}}</p>
        <br>
        <p>Localidad: {{$datosGenerador->ciudad}}</p>
        <br>
        <p>Cuit: {{$datosGenerador->cuit}}</p>
        <br>
        <p>RPGyOSP N°: {{$datosGenerador->cli_nro_hab_pro}}</p>
        <br><br><br>
        <p>Firma (R.T.A.): </p>
    </div>

    <div class="dataOperador">
        <h2>DATOS DEL OPERADOR</h2>

        <br><br>

        <p>Razón Social: {{$datosOperador->id_operador_df}}</p>
        <br>
        <p>Domicilio: {{$datosOperador->direc_odf}}</p>
        <br>
        <p>Localidad: {{$datosOperador->local_odf}}</p>
        <br>
        <p>Cuit: {{$datosOperador->cuit_odf}}</p>
        <br>
        <p>RPGyOSP N°: {{$datosOperador->hab_pro_nro_odf}}</p>
        <br><br><br>
        <p>Firma (R.T.A.): </p>
    </div>

    <div class="detalle">
        <table class="table">
            <tbody>
                <tr>
                    <td class="lostitulos" colspan="4">
                        RESIDUOS
                    </td>
                    <td class="lostitulos" colspan="2">
                        TRANSPORTE
                    </td>
                    <td class="lostitulos" colspan="3">
                        TRATAMIENTO
                    </td>
                </tr>
                <tr>
                    <td class="losSubtitulos">TIPO</td>
                    <td class="losSubtitulos">ESTADO FÍSICO</td>
                    <td class="losSubtitulos">CANTIDAD</td>
                    <td class="losSubtitulos">UM</td>
                    <td class="losSubtitulos">TRANSPORTISTA</td>
                    <td class="losSubtitulos">N° MANFIESTO</td>
                    <td class="losSubtitulos">FECHA</td>
                    <td class="losSubtitulos">TIPO</td>
                    <td class="losSubtitulos">UBICACION</td>
                </tr>
                @foreach ($dataDetalle as $datosDetalle)
                <?php

                $fechaDB = $datosDetalle->fechatratamiento;

                $fechaSet1 = Carbon::parse($fechaDB);

                $fechaTratamiento = $fechaSet1->format('d-m-Y');
                ?>
                <tr>

                    <td class="losDatos">{{$datosDetalle->corriente}}</td>
                    <td class="losDatos">{{$datosDetalle->estado}}</td>
                    <td class="losDatos">{{$datosDetalle->cantidad}}</td>
                    <td class="losDatos">{{$datosDetalle->um}}</td>
                    <td class="losDatos">{{$datosDetalle->transportista}}</td>
                    <td class="losDatos">{{$datosDetalle->numero_manifiesto}}</td>
                    <td class="losDatos">{{$fechaTratamiento}}</td>
                    <td class="losDatos">{{$datosDetalle->tipotratamiento}}</td>
                    <td class="losDatos">{{$datosDetalle->ubicacion}}</td>

                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</body>

</html>