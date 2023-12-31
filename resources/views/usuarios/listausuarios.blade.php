<?php

use App\Models\roles;
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

        <?php
        $rol = roles::where('id_rol', '=', $datosUsuario->rol_id)->get();
        $fechaDB = $datosUsuario->fecha_usu_alta;
        $fechaDB2 = $datosUsuario->fecha_usu_modi;

        $fechaSet1 = Carbon::parse($fechaDB);
        $fechaSet2 = Carbon::parse($fechaDB2);

        $fechaAlta = $fechaSet1->format('d-m-Y');
        $fechaModif = $fechaSet2->format('d-m-Y');
        ?>

        @foreach ($rol as $nombreRol)
        <tr>
            <td>{{$datosUsuario->dni}}</td>
            <td>{{$datosUsuario->nombre}}</td>
            <td>{{$datosUsuario->usuario}}</td>
            <td>{{$datosUsuario->empresa}}</td>
            <td>{{$fechaAlta}}</td>
            <td>{{$fechaModif}}</td>
            <td>{{$nombreRol->rol}}</td>
            <td>{{$datosUsuario->baneado}}</td>
            <td><a href="{{ route('editarusuario', ['id' => $datosUsuario->id]) }}">Editar</a></td>
        </tr>

        @endforeach
        @endforeach
    </tbody>

</table>

@endsection