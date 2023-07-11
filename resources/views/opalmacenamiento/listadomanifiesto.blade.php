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

<h2 class="mt-3">LISTA DE MANIFIESTOS DE OPERADORAS DE ALMACENAMIENTO</h2>
<table class="table table-light mt-4 w-85">

    <thead>
        <tr>
            <th>N° MANIFIESTO</th>
            <th>FECHA MANIFIESTO</th>
            <th>TRANSPORTE</th>
            <th>GENERADOR</th>
            <th>DOMINIO</th>
            <th>CORRIENTE</th>
            <th>VOLUMEN</th>
            <th>UM</th>
            <th>TIPO DE RECIPIENTE</th>
            <th>N° MANIF. SALIDA</th>
            <th>N° CERTIF. D.F.</th>
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
            <td>{{$datosManifiestoCabecera->nom_comp}}</td>
            <td>{{$datosManifiestoCabecera->id_patente}}</td>


            <td>{{$datosManifiestoDetalles->id_corrientes}}</td>
            <td>{{$datosManifiestoDetalles->cantidad}}</td>
            <td>{{$datosManifiestoDetalles->um}}</td>
            <td>{{$datosManifiestoDetalles->descr_ingreso}}</td>
            <td>{{$datosManifiestoDetalles->id_man_tra_nac}}</td>
            <td>{{$datosManifiestoDetalles->nro_cert_disp_final}}</td>
            <td>{{$datosManifiestoDetalles->estadooo}}</td>
        </tr>

        @endforeach
        @endif
        @endforeach
    </tbody>


</table>

@endsection