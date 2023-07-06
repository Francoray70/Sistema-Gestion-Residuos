<?php

use app\Http\Controllers\TransportistaController;

?>


@extends('nav')

<style>
    .container {
        background-color: rgb(228, 228, 228);
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

        <tr>
            <td>{{$datosUsuario->id_transp}}</td>
            <td>{{$datosUsuario->cuit_trans}}</td>
            <td>{{$datosUsuario->direc_transp}}</td>
            <td>{{$datosUsuario->local_transp}}</td>
            <td>{{$datosUsuario->transp_act}}</td>
            <td><a href="{{$datosUsuario->hab_pcia_transp}}">Ver</a></td>
            <td>{{$datosUsuario->trans_vto_hab_pro}}</td>
            <td><a href="{{$datosUsuario->hab_nac_transp}}">Ver</a></td>
            <td>{{$datosUsuario->trans_vto_hab_nac}}</td>
            <td><a href="{{$datosUsuario->hab_mun_transp}}">Ver</a></td>
            <td>{{$datosUsuario->trans_vto_hab_mun}}</td>
            <td><a href="">Actualizar</a></td>
            <td><a href="{{ route('editartransporte', ['id' => $datosUsuario->id]) }}">Editar</a></td>
        </tr>

        @endforeach
    </tbody>

</table>

@endsection