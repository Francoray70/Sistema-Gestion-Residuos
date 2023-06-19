<?php

use app\Http\Controllers\EmpresasController;

?>

@extends('nav')

<style>
    .container {
        background-color: rgb(228, 228, 228);
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

        <tr>
            <td>{{$datosEmpresa->nombre}}</td>
            <td>{{$datosEmpresa->cuit}}</td>
            <td>{{$datosEmpresa->fecha_alta}}</td>
            <td>{{$datosEmpresa->fecha_modificacion}}</td>
            <td>{{$datosEmpresa->rol_id}}</td>
            <td>Editar</td>
        </tr>

        @endforeach
    </tbody>

</table>


@endsection