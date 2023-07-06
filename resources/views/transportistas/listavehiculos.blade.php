<?php

use app\Http\Controllers\ChoferController;

?>


@extends('nav')

<style>
    .container {
        background-color: rgb(228, 228, 228);
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

        <tr>
            <td>{{$datosVehiculos->id_transp}}</td>
            <td>{{$datosVehiculos->id_patente}}</td>
            <td><a href="{{$datosVehiculos->pat_tit}}">Ver</a></td>
            <td><a href="{{$datosVehiculos->pat_ced_verde}}">Ver</a></td>
            <td>{{$datosVehiculos->pat_cpel_nro}}</td>
            <td><a href="{{$datosVehiculos->pat_cpel_img}}">Ver</a></td>
            <td>{{$datosVehiculos->pat_cpel_vto}}</td>
            <td><a href="{{$datosVehiculos->pat_rut}}">Ver</a></td>
            <td>{{$datosVehiculos->pat_rut_vto}}</td>
            <td><a href="{{$datosVehiculos->pat_vtv_img}}">Ver</a></td>
            <td>{{$datosVehiculos->pat_vtv_vto}}</td>
            <td><a href="">Actualizar</a></td>
            <td><a href="">Editar</a></td>
        </tr>

        @endforeach
    </tbody>

</table>

@endsection