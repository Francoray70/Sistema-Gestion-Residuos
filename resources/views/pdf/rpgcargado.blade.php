<?php

use App\Models\manifiestodet;

$dataDetalle = manifiestodet::where('id_man_tra_nac', '=', $manifiestoTN)
    ->where('rpg', '<>', '')
    ->join('manifiesto', 'manifiesto.id_manifiesto', '=', 'manifiestodet.id_manifies')
    ->select('manifiesto.*', 'manifiestodet.*')
    ->where('nom_comp', 'LIKE', '%' . $generadorNombre . '%')
    ->get();
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

    @foreach ($generador as $datosGenerador)

    @endforeach
    @foreach ($opalmacenamiento as $datosOperador)

    @endforeach

    <!--------------------------FINAL DEL LLAMADO A OTROS DATOS PARA EL PDF--------------------------------------->

    <div class="cabeza">

        <p class="tipeado">
            CERTIFICADO DE TRATAMIENTO / DISPOSICIÓN FINAL <br>
            RESIDUOS PELIGROSOS N°: {{$rpg}} <br>
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
        <p>Cuit: {{$datosGenerador->cuit}}</p>
        <br>
        <p>RPGyOSP N°: {{$datosGenerador->cli_nro_hab_pro}}</p>
        <br><br><br>
        <p>Firma (R.T.A.): </p>
    </div>

    <div class="dataOperador">
        <h2>DATOS DEL OPERADOR</h2>

        <br><br>

        <p>Razón Social: {{$datosOperador->gener_nom}}</p>
        <br>
        <p>Domicilio: {{$datosOperador->gener_dir}}</p>
        <br>
        <p>Cuit: {{$datosOperador->gener_cuit}}</p>
        <br>
        <p>RPGyOSP N°: {{$datosOperador->gener_nro_hab_pro}}</p>
        <br><br><br>
        <p>Firma (R.T.A.): </p>
    </div>

    <div class="detalle">
        <table class="table">
            <tbody>
                <tr>
                    <td class="lostitulos" colspan="3">
                        RESIDUOS
                    </td>
                    <td class="lostitulos" colspan="4">
                        TRANSPORTE
                    </td>
                    <td class="lostitulos" colspan="5">
                        OPERADORA
                    </td>
                    <td class="lostitulos">
                        TRATAMIENTO
                    </td>
                </tr>
                <tr>
                    <td class="losSubtitulos">TIPO</td>
                    <td class="losSubtitulos">ESTADO FÍSICO</td>
                    <td class="losSubtitulos">CANTIDAD</td>
                    <td class="losSubtitulos">TRANSPORTISTA</td>
                    <td class="losSubtitulos">RPG</td>
                    <td class="losSubtitulos">FECHA</td>
                    <td class="losSubtitulos">MANFIESTO</td>
                    <td class="losSubtitulos">MANFIESTO</td>
                    <td class="losSubtitulos">FECHA</td>
                    <td class="losSubtitulos">OPERADORA</td>
                    <td class="losSubtitulos">UBICACION</td>
                    <td class="losSubtitulos">CERTIFICADO</td>
                    <td class="losSubtitulos">TIPO</td>
                </tr>
                @foreach ($certificado as $dataCertificado)

                @endforeach
                @foreach ($dataDetalle as $datosDetalle)

                <tr>

                    <td class="losDatos">{{$datosDetalle->id_corrientes}}</td>
                    <td class="losDatos">{{$datosDetalle->estado}}</td>
                    <td class="losDatos">{{$datosDetalle->cantidad}}</td>
                    <td class="losDatos">{{$datosDetalle->id_transpo}}</td>
                    <td class="losDatos">{{$datosDetalle->rpg}}</td>
                    <td class="losDatos">{{$datosDetalle->fecha_alta_manif}}</td>
                    <td class="losDatos">{{$datosDetalle->id_manifiesto}}</td>
                    <td class="losDatos">{{$datosDetalle->id_man_tra_nac}}</td>
                    <td class="losDatos">{{$datosDetalle->fcha_entr_cdf}}</td>
                    <td class="losDatos">{{$dataCertificado->opdfinal}}</td>
                    <td class="losDatos">{{$dataCertificado->ubicacion}}</td>
                    <td class="losDatos">{{$dataCertificado->nro_cert_disp_final}}</td>
                    <td class="losDatos">{{$dataCertificado->tipotratamiento}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</body>

</html>