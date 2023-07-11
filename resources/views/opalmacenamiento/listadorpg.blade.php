<?php

use App\Models\manifiestodet;
?>

@extends('nav')

<style>
    .container {
        background-color: rgb(228, 228, 228);
    }
</style>

@section('navbar')

<h2 class="mt-3">LISTA DE RPG DE OPERADORAS DE ALMACENAMIENTO</h2>
<table class="table table-light mt-4 w-85">

    <thead>
        <tr>
            <th>RPG</th>
            <th>N° CERTIF. RPG</th>
            <th>GENERADOR</th>
            <th>CERTIF. D.F.</th>
            <th>MANIFIESTO SALIDA</th>
            <th>N° MANIFIESTO</th>
            <th>FECHA ALTA</th>
            <th>CORRIENTE</th>
            <th>CANTIDAD</th>
            <th>TRANSPORTISTA</th>
            <th>ESTADO</th>
        </tr>
    </thead>

    <tbody>
        @foreach ($resultados as $datosManifiestoCabecera)
        <?php
        $detalles = manifiestodet::where('id_manifies', $datosManifiestoCabecera->id_manifiesto)->get();
        ?>
        @if(!empty($detalles))
        @foreach ($detalles as $datosManifiestoDetalles)

        <tr>
            <td>{{$datosManifiestoDetalles->rpg}}</td>
            <td>{{$datosManifiestoDetalles->nro_cert_rpg}}</td>
            <td>{{$datosManifiestoCabecera->nom_comp}}</td>
            <td>{{$datosManifiestoDetalles->nro_cert_disp_final}}</td>
            <td>{{$datosManifiestoDetalles->id_man_tra_nac}}</td>


            <td>{{$datosManifiestoDetalles->id_manifies}}</td>
            <td>{{$datosManifiestoCabecera->fecha_alta_manif}}</td>
            <td>{{$datosManifiestoDetalles->id_corrientes}}</td>
            <td>{{$datosManifiestoDetalles->cantidad}}</td>
            <td>{{$datosManifiestoDetalles->id_transpo}}</td>
            <td>{{$datosManifiestoDetalles->estadooo}}</td>
        </tr>

        @endforeach
        @endif
        @endforeach
    </tbody>


</table>

@endsection