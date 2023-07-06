<?php

use app\Http\Controllers\CorrientestransporteController;

?>

@extends('nav')

<style>
    .container {
        background-color: rgb(228, 228, 228);
    }
</style>

@section('navbar')


<h2 class="mt-3">LISTA DE CORRIENTES DE TRANSPORTES</h2>
<table class="table table-light mt-4 w-85">

    <thead>
        <tr>
            <th>TRANSPORTE</th>
            <th>CORRIENTE</th>
            <th>DESCRIPCIÓN</th>
            <th>UNIDAD DE MEDIDA</th>
            <th>ESTADO</th>
            <th>PELIGROSIDAD</th>
            <th>EDITAR</th>
            <th>ELIMINAR</th>
        </tr>
    </thead>

    <tbody>
        @foreach ($corrientes as $datosCorrientes)

        <tr>
            <td>{{$datosCorrientes->id_transp}}</td>
            <td>{{$datosCorrientes->id_corrientes}}</td>
            <td>{{$datosCorrientes->descripcion}}</td>
            <td>{{$datosCorrientes->um}}</td>
            <td>{{$datosCorrientes->estado}}</td>
            <td>{{$datosCorrientes->peligrosidad}}</td>
            <td><a href="">Editar</a></td>
            <td><a href="">Eliminar</a></td>
        </tr>

        @endforeach
    </tbody>

</table>


@endsection