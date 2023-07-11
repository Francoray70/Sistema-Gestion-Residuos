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

<h2 class="mt-3">MANIFIESTO BUSCADO</h2>
<table class="table table-light mt-4 w-85">

    <thead>
        <tr>
            <th>N° MANIFIESTO</th>
            <th>FECHA</th>
            <th>GENERADOR</th>
            <th>TRANSPORTE</th>
            <th>DOMINIO</th>
            <th>CHOFER</th>
            <th>OPPERADOR D.F.</th>
            <th>ESTADO PEDIDO</th>
            <th>CORRIENTE</th>
            <th>UM</th>
            <th>CANTIDAD</th>
            <th>MAN. PROV/NAC</th>
            <th>CERTIF. DISP. FINAL</th>
            <th>RPG</th>
            <th>NUMERO</th>
            <th>EDITAR</th>
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
            <td>{{$datosManifiestoCabecera->nom_comp}}</td>
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
            <td>{{$datosManifiestoDetalles->rpg}}</td>
            <td><a href="{{}}">Editar</a></td>
        </tr>

        @endforeach
        @endif
        @endforeach
    </tbody>


</table>

@endsection