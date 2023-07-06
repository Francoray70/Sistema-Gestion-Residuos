<?php

use app\Http\Controllers\DireccionController;

?>

@extends('nav')

<style>
    .container {
        background-color: rgb(228, 228, 228);
    }
</style>

@section('navbar')


<h2 class="mt-3">LISTA DE CORRIENTES DE GENERADORES</h2>
<table class="table table-light mt-4 w-85">

    <thead>
        <tr>
            <th>GENERADOR</th>
            <th>DIRECCION</th>
            <th>PROVINCIA</th>
            <th>CIUDAD</th>
            <th>EDITAR</th>
        </tr>
    </thead>

    <tbody>
        @foreach ($direcciones as $datosDirecciones)

        <tr>
            <td>{{$datosDirecciones->nom_comp}}</td>
            <td>{{$datosDirecciones->dir_de_retiro}}</td>
            <td>{{$datosDirecciones->provincia}}</td>
            <td>{{$datosDirecciones->ciudad}}</td>
            <td><a href="">Editar</a></td>
        </tr>

        @endforeach
    </tbody>

</table>


@endsection