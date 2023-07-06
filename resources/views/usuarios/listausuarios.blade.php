<?php

use app\Http\Controllers\nombresUsuarios;

?>


@extends('nav')

<style>
    .container {
        background-color: rgb(228, 228, 228);
    }
</style>

@section('navbar')

<h2 class="mt-3">LISTA DE USUARIOS</h2>
<table class="table table-light mt-4 w-85">

    <thead>
        <tr>
            <th>DNI</th>
            <th>USUARIO</th>
            <th>CUIT DE LA EMPRESA</th>
            <th>EMPRESA</th>
            <th>FECHA DE INICIO</th>
            <th>ULTIMA ACTUALIZACION</th>
            <th>ROL</th>
            <th>BANEADO</th>
            <th>EDITAR</th>
        </tr>
    </thead>

    <tbody>
        @foreach ($registros as $datosUsuario)

        <tr>
            <td>{{$datosUsuario->dni}}</td>
            <td>{{$datosUsuario->nombre}}</td>
            <td>{{$datosUsuario->usuario}}</td>
            <td>{{$datosUsuario->empresa}}</td>
            <td>{{$datosUsuario->fecha_usu_alta}}</td>
            <td>{{$datosUsuario->fecha_usu_modi}}</td>
            <td>{{$datosUsuario->rol_id}}</td>
            <td>{{$datosUsuario->baneado}}</td>
            <td><a href="">Editar</a></td>
        </tr>

        @endforeach
    </tbody>

</table>

@endsection