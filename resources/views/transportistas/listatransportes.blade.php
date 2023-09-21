<?php

use Carbon\Carbon;
?>

@extends('nav')

<style>
    .table {
        background-color: rgb(228, 228, 228);
        font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
    }
</style>

@section('navbar')

<h2 class="mt-3">LISTA DE TRANSPORTES</h2>
<table class="table table-light mt-4 w-85">

    <thead>
        <tr>
            <th>TRANSPORTE</th>
            <th>CUIT EMPRESA</th>
            <th>DIRECCIÓN</th>
            <th>LOCALIDAD</th>
            <th>ESTADO</th>
            <th>IMG. HAB. PROVINCIA</th>
            <th>VTO. HAB. PROVINCIA</th>
            <th>IMG. HAB. NACIONAL</th>
            <th>VTO. HAB. NACIONAL</th>
            <th>IMG. HAB. MUNICIPIO</th>
            <th>VTO. HAB. MUNICIPIO</th>
            <th>ACTUALIZAR IMAGENES</th>
            <th>EDITAR</th>
        </tr>
    </thead>

    <tbody>
        @foreach ($registros as $datosUsuario)

        <?php
        $fechaDB1 = $datosUsuario->trans_vto_hab_pro;
        $fechaDB2 = $datosUsuario->trans_vto_hab_nac;
        $fechaDB3 = $datosUsuario->trans_vto_hab_mun;

        $fechaSet1 = Carbon::parse($fechaDB1);
        $fechaSet2 = Carbon::parse($fechaDB2);
        $fechaSet3 = Carbon::parse($fechaDB3);

        $fecha1 = $fechaSet1->format('d-m-Y');
        $fecha2 = $fechaSet2->format('d-m-Y');
        $fecha3 = $fechaSet3->format('d-m-Y');
        ?>
        <tr>
            <td>{{$datosUsuario->id_transp}}</td>
            <td>{{$datosUsuario->cuit_trans}}</td>
            <td>{{$datosUsuario->direc_transp}}</td>
            <td>{{$datosUsuario->local_transp}}</td>
            <td>{{$datosUsuario->transp_act}}</td>
            <td><a href="{{ route('verprovinciat', ['id' => $datosUsuario->id]) }}">Ver</a></td>
            <td>{{$fecha1}}</td>
            <td><a href="{{ route('vernaciont', ['id' => $datosUsuario->id]) }}">Ver</a></td>
            <td>{{$fecha2}}</td>
            <td><a href="{{ route('vermunicipalt', ['id' => $datosUsuario->id]) }}">Ver</a></td>
            <td>{{$fecha3}}</td>
            <td><a href="{{ route('actualizarimgtransp', ['id' => $datosUsuario->id]) }}">Actualizar</a></td>
            <td><a href="{{ route('editartransporte', ['id' => $datosUsuario->id]) }}">Editar</a></td>
        </tr>

        @endforeach
    </tbody>

</table>

@endsection