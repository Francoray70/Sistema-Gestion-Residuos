<?php

use app\Http\Controllers\ActividadesController;

?>

@extends('nav')

<style>
    .container {
        background-color: rgb(228, 228, 228);
    }
</style>

@section('navbar')


<h2 class="mt-3">LISTA DE ACTIVIDADES</h2>
<table class="table table-light mt-4 w-85">

    <thead>
        <tr>
            <th>ACTIVIDADES</th>
            <th>EDITAR</th>
        </tr>
    </thead>

    <tbody>
        @foreach ($actividades as $datosActividades)

        <tr>
            <td>{{$datosActividades->actividades}}</td>
            <td>Editar</td>
        </tr>

        @endforeach
    </tbody>

</table>


@endsection