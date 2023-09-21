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

<h2 class="mt-3">LISTA DE VEHICULOS</h2>
<table class="table table-light mt-4 w-85">

    <thead>
        <tr>
            <th>TRANSPORTE</th>
            <th>PATENTE</th>
            <th>TITULO</th>
            <th>CEDULA VERDE</th>
            <th>N° CARGAS PELIGROSAS</th>
            <th>CARGAS PELIGROSAS</th>
            <th>VTO. CARGA PELIGROSA</th>
            <th>RUTA</th>
            <th>VTO. RUTA</th>
            <th>VTV</th>
            <th>VTO. VTV</th>
            <th>ACTUALIZAR IMAGENES</th>
            <th>EDITAR</th>
        </tr>
    </thead>

    <tbody>
        @foreach ($vehiculos as $datosVehiculos)

        <?php
        $fechaDB1 = $datosVehiculos->pat_cpel_vto;
        $fechaDB2 = $datosVehiculos->pat_rut_vto;
        $fechaDB3 = $datosVehiculos->pat_vtv_vto;

        $fechaSet1 = Carbon::parse($fechaDB1);
        $fechaSet2 = Carbon::parse($fechaDB2);
        $fechaSet3 = Carbon::parse($fechaDB3);

        $fecha1 = $fechaSet1->format('d-m-Y');
        $fecha2 = $fechaSet2->format('d-m-Y');
        $fecha3 = $fechaSet3->format('d-m-Y');
        ?>
        <tr>
            <td>{{$datosVehiculos->id_transp}}</td>
            <td>{{$datosVehiculos->id_patente}}</td>
            <td><a href="{{ route('verprop', ['id' => $datosVehiculos->id]) }}">Ver</a></td>
            <td><a href="{{ route('verced', ['id' => $datosVehiculos->id]) }}">Ver</a></td>
            <td>{{$datosVehiculos->pat_cpel_nro}}</td>
            <td><a href="{{ route('vercpveh', ['id' => $datosVehiculos->id]) }}">Ver</a></td>
            <td>{{$fecha1}}</td>
            <td><a href="{{ route('veruta', ['id' => $datosVehiculos->id]) }}">Ver</a></td>
            <td>{{$fecha2}}</td>
            <td><a href="{{ route('vervtv', ['id' => $datosVehiculos->id]) }}">Ver</a></td>
            <td>{{$fecha3}}</td>
            <td><a href="{{ route('actualizarimgvehi', ['id' => $datosVehiculos->id]) }}">Actualizar</a></td>
            <td><a href="{{ route('editarvehiculo', ['id' => $datosVehiculos->id]) }}">Editar</a></td>
        </tr>

        @endforeach
    </tbody>

</table>

@endsection