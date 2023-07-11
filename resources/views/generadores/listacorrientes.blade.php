<?php

use app\Http\Controllers\CorrientesgeneradorController;

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
            <td>{{$datosCorrientes->generador}}</td>
            <td>{{$datosCorrientes->id_corrientes}}</td>
            <td>{{$datosCorrientes->descripcion}}</td>
            <td>{{$datosCorrientes->um}}</td>
            <td>{{$datosCorrientes->estado}}</td>
            <td>{{$datosCorrientes->peligrosidad}}</td>
            <td><a href="{{ route('editarcorrientegenerador', ['id' => $datosCorrientes->id]) }}">Editar</a></td>
            <td>
                <form action="{{url('/corrientesgenerador/'.$datosCorrientes->id)}}" method="post">
                    {{ @method_field('DELETE') }}
                    @csrf
                    <button type="submit" class="btn btn-primary p-0">Eliminar</button>
                </form>
            </td>
        </tr>

        @endforeach
    </tbody>

</table>


@endsection