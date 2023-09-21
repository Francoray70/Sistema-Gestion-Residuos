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

<h2 class="mt-3">LISTA DE OPERADORES</h2>
<table class="table table-light mt-4 w-85">

    <thead>
        <tr>
            <th>RAZÓN SOCIAL</th>
            <th>CUIT EMPRESAS GENERADORA</th>
            <th>DIRECCIÓN</th>
            <th>LOCALIDAD</th>
            <th>CP</th>
            <th>UBI. PLANTA TRATAMIENTO</th>
            <th>¿ES ODF?</th>
            <th>HAB. PROV.</th>
            <th>VTO. HAB. PROV.</th>
            <th>HAB. NAC</th>
            <th>VTO. HAB. NAC.</th>
            <th>HAB. MUN.</th>
            <th>VTO. HAB. MUNICIPAL</th>
            <th>ACTUALIZAR IMAGENES</th>
            <th>EDITAR</th>
        </tr>
    </thead>

    <tbody>
        @foreach ($operadores as $datosOperador)

        <?php


        $fechaDB = $datosOperador->gener_vto_hab_pro;
        $fechaDB2 = $datosOperador->gener_vto_hab_nac;
        $fechaDB3 = $datosOperador->gener_vto_hab_mun;

        $fechaSet1 = Carbon::parse($fechaDB);
        $fechaSet2 = Carbon::parse($fechaDB2);
        $fechaSet3 = Carbon::parse($fechaDB3);

        $fecha1 = $fechaSet1->format('d-m-Y');
        $fecha2 = $fechaSet2->format('d-m-Y');
        $fecha3 = $fechaSet3->format('d-m-Y');
        ?>
        <tr>
            <td>{{$datosOperador->gener_nom}}</td>
            <td>{{$datosOperador->gener_cuit}}</td>
            <td>{{$datosOperador->gener_dir}}</td>
            <td>{{$datosOperador->gener_ciu}}</td>
            <td>{{$datosOperador->gener_cp}}</td>
            <td>{{$datosOperador->gener_ubi}}</td>
            <td>{{$datosOperador->dispfinal}}</td>
            <td><a href="{{ route('verprovinciaopalm', ['id' => $datosOperador->id]) }}">Ver</a></td>
            <td>{{$fecha1}}</td>
            <td><a href="{{ route('vernacionopalm', ['id' => $datosOperador->id]) }}">Ver</a></td>
            <td>{{$fecha2}}</td>
            <td><a href="{{ route('vermunicipalopalm', ['id' => $datosOperador->id]) }}">Ver</a></td>
            <td>{{$fecha3}}</td>
            <td><a href="{{ route('actualizarimgopalm', ['id' => $datosOperador->id]) }}">Actualizar</a></td>
            <td><a href="{{ route('editaropalm', ['id' => $datosOperador->id]) }}">Editar</a></td>
        </tr>

        @endforeach
    </tbody>

</table>

@endsection