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
        @foreach ($empresas as $empresa)

        <tr>
            <td>{{$empresa->nombre}}</td>
            <td>{{$empresa->cuit}}</td>
            <td>{{$empresa->fecha_alta}}</td>
            <td>{{$empresa->fecha_modificacion}}</td>
            <td>{{$empresa->rol_id}}</td>
            <td>Editar</td>
        </tr>

        @endforeach
    </tbody>

</table>


@endsection