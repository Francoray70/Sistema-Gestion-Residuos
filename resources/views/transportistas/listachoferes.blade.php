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

<h2 class="mt-3">LISTA DE CHOFERES</h2>
<table class="table table-light mt-4 w-85">

    <thead>
        <tr>
            <th>CHOFER</th>
            <th>TRANSPORTE</th>
            <th>N° CARNET</th>
            <th>CARNET</th>
            <th>VTO. CARNET</th>
            <th>CARGA PELIGROSA</th>
            <th>VTO. CARGA PELIGROSA</th>
            <th>S.E.P.</th>
            <th>VTO. S.E.P.</th>
            <th>ACTUALIZAR IMAGENES</th>
            <th>EDITAR</th>
        </tr>
    </thead>

    <tbody>
        @foreach ($choferes as $datosChoferes)

        <tr>
            <td>{{$datosChoferes->chofer}}</td>
            <td>{{$datosChoferes->id_transp}}</td>
            <td>{{$datosChoferes->nro_carnet}}</td>
            <td><a href="{{$datosChoferes->nro_carnet_img}}">Ver</a></td>
            <td>{{$datosChoferes->nro_carnet_vto}}</td>
            <td><a href="{{$datosChoferes->carga_pelig_img}}">Ver</a></td>
            <td>{{$datosChoferes->carga_pelig_vto}}</td>
            <td><a href="{{$datosChoferes->sep_img}}">Ver</a></td>
            <td>{{$datosChoferes->sep_vto}}</td>
            <td><a href="">Actualizar</a></td>
            <td><a href="">Editar</a></td>
        </tr>

        @endforeach
    </tbody>

</table>

@endsection