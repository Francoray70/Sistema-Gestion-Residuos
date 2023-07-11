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

<h2 class="mt-3">LISTA DE MANIFIESTOS DE GENERADORES</h2>
<table class="table table-light mt-4 w-85">

    <thead>
        <tr>
            <th>N° MANIFIESTO</th>
            <th>FECHA MANIFIESTOS</th>
            <th>TRANSPORTE</th>
            <th>DOMINIO</th>
            <th>CHOFER</th>
            <th>OPERADOR</th>
            <th>ESTADO MANIFIESTO</th>
            <th>CORRIENTE</th>
            <th>UM</th>
            <th>CANTIDAD</th>
            <th>MANIF. SALIDA</th>
            <th>CERT. DISP. FINAL</th>
            <th>RPG N° CERTIF.</th>
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
            <td>{{$datosManifiestoCabecera->id_manifiesto}}</td>
            <td>{{$datosManifiestoCabecera->fecha_alta_manif}}</td>
            <td>{{$datosManifiestoCabecera->id_transp}}</td>
            <td>{{$datosManifiestoCabecera->id_patente}}</td>
            <td>{{$datosManifiestoCabecera->chofer}}</td>
            <td>{{$datosManifiestoCabecera->gener_nom}}</td>



            <td>{{$datosManifiestoDetalles->estado_det_manif}}</td>
            <td>{{$datosManifiestoDetalles->id_corrientes}}</td>
            <td>{{$datosManifiestoDetalles->um}}</td>
            <td>{{$datosManifiestoDetalles->cantidad}}</td>
            <td>{{$datosManifiestoDetalles->id_man_tra_nac}}</td>
            <td>{{$datosManifiestoDetalles->nro_cert_disp_final}}</td>
            <td>{{$datosManifiestoDetalles->nro_cert_rpg}}</td>
            <td>{{$datosManifiestoDetalles->estadooo}}</td>
        </tr>

        @endforeach
        @endif
        @endforeach
    </tbody>


</table>

@endsection