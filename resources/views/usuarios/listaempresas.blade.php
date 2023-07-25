<?php

use App\Models\roles;
?>

@extends('nav')

<style>
    .table {
        background-color: rgb(228, 228, 228);
        font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
    }
</style>

@section('navbar')


<h2 class="mt-3">LISTA DE EMPRESAS</h2>
<table class="table table-light mt-4 w-85">

    <thead>
        <tr>
            <th>EMPRESA</th>
            <th>CUIT</th>
            <th>FECHA DE ALTA</th>
            <th>ULT. ACTUALIZACIÓN</th>
            <th>ROL</th>
            <th>EDITAR</th>
        </tr>
    </thead>

    <tbody>
        @foreach ($registros as $datosEmpresa)

        <?php
        $rol = roles::where('id_rol', '=', $datosEmpresa->rol_id)->get();
        ?>

        @foreach ($rol as $nombreRol)

        <tr>
            <td>{{$datosEmpresa->nombre}}</td>
            <td>{{$datosEmpresa->cuit}}</td>
            <td>{{$datosEmpresa->fecha_alta}}</td>
            <td>{{$datosEmpresa->fecha_modificacion}}</td>
            <td>{{$nombreRol->rol}}</td>
            <td><a href="{{ route('editarempresa', ['id' => $datosEmpresa->id]) }}">Editar</a></td>
        </tr>

        @endforeach
        @endforeach
    </tbody>

</table>


@endsection