<?php

use app\Http\Controllers\Localidad;

?>

@extends('nav')

<style>
    .container {
        background-color: rgb(228, 228, 228);
    }
</style>

@section('navbar')


<h2 class="mt-3">LISTA DE LOCALIDADES</h2>
<table class="table table-light mt-4 w-85">

    <thead>
        <tr>
            <th>PROVINCIA</th>
            <th>CIUDAD</th>
            <th>CODIGO POSTAL</th>
            <th>EDITAR</th>
        </tr>
    </thead>

    <tbody>
        @foreach ($ciudades as $datosLocalidades)

        <tr>
            <td>{{$datosLocalidades->provincia}}</td>
            <td>{{$datosLocalidades->ciudades}}</td>
            <td>{{$datosLocalidades->cp}}</td>
            <td>Editar</td>
        </tr>

        @endforeach
    </tbody>

</table>


@endsection