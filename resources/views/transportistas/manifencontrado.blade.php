<?php

use App\Models\manifiestodet;
?>

@extends('nav')

<style>
    .table {
        background-color: rgb(228, 228, 228);
        font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
    }
</style>

@section('navbar')

@foreach ($resultados as $datosManifiestoCabecera)
@endforeach
<h2 class="mt-3">MANIFIESTO N° {{$datosManifiestoCabecera->id_manifiesto}}</h2>
<table class="table table-light mt-4 w-85">

    <thead>
        <tr>
            <th>🖨</th>
            <th>N° MANIF.</th>
            <th>FECHA</th>
            <th>GENERADOR</th>
            <th>TRANSPORTE</th>
            <th>DOMINIO</th>
            <th>CHOFER</th>
            <th>OPERADOR DF</th>
            <th>ESTADO PEDIDO</th>
            <th>CORRIENTE</th>
            <th>UM</th>
            <th>CANTIDAD</th>
            <th>MAN. PROV/NAC</th>
            <th>CERTIF. DF</th>
            <th>RPG</th>
            <th>NUMERO</th>
            <th>EDITAR</th>
        </tr>
    </thead>

    <form action="{{url('/reimprimirelpdf')}}" method="get">
        <tbody>
            <?php
            $detalles = manifiestodet::where('id_manifies', $datosManifiestoCabecera->id_manifiesto)->get();
            ?>
            @if(!empty($detalles))
            @foreach ($detalles as $datosManifiestoDetalles)

            <tr>
                <td><input type="checkbox" name="id" value="{{$datosManifiestoCabecera->id}}"></td>
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
                <td><a href="{{url('/editarmanifiestodetalle/'.$datosManifiestoDetalles->id)}}">Editar</a></td>
            </tr>

            @endforeach
            @endif
        </tbody>


</table>
<button type="submit" class="btn btn-primary ml-3">Imprimir</button>

@endsection