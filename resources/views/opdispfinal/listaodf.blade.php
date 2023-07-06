<?php

use app\Http\Controllers\OperadordfController;

?>

@extends('nav')

<style>
    .container {
        background-color: rgb(228, 228, 228);
    }
</style>

@section('navbar')

<h2 class="mt-3">LISTA DE OPERADORES</h2>
<table class="table table-light mt-4 w-85">

    <thead>
        <tr>
            <th>OPERADOR</th>
            <th>CUIT EMPRESAS OPERADORAS</th>
            <th>DIRECCIÓN</th>
            <th>LOCALIDAD</th>
            <th>PROVINCIA</th>
            <th>UBI. PLANTA TRATAMIENTO</th>
            <th>IMG. HAB. PROV.</th>
            <th>VTO. HAB. PROV.</th>
            <th>IMG. HAB. NAC</th>
            <th>VTO. HAB. NAC.</th>
            <th>IMG. HAB. MUN.</th>
            <th>VTO. HAB. MUNICIPAL</th>
            <th>ACTUALIZAR IMAGENES</th>
            <th>EDITAR</th>
        </tr>
    </thead>

    <tbody>
        @foreach ($operadores as $datosOperador)

        <tr>
            <td>{{$datosOperador->id_operador_df }}</td>
            <td>{{$datosOperador->cuit_odf}}</td>
            <td>{{$datosOperador->direc_odf}}</td>
            <td>{{$datosOperador->local_odf}}</td>
            <td>{{$datosOperador->prov_odf}}</td>
            <td>{{$datosOperador->ubi_odf}}</td>
            <td><a href="{{$datosOperador->hab_pro_odf}}">Ver</a></td>
            <td>{{$datosOperador->hab_pro_vto_odf}}</td>
            <td><a href="{{$datosOperador->habil_nacion}}">Ver</a></td>
            <td>{{$datosOperador->vto_hab_nac}}</td>
            <td><a href="{{$datosOperador->hab_mun_odf}}">Ver</a></td>
            <td>{{$datosOperador->hab_mun_vto_odf}}</td>
            <td><a href="">Actualizar</a></td>
            <td><a href="{{ route('editarodf', ['id' => $datosOperador->id]) }}">Editar</a></td>
        </tr>

        @endforeach
    </tbody>

</table>

@endsection