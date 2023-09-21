<?php

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

<h2 class="mt-3">LISTA DE CHOFERES</h2>
<table class="table table-light mt-4 w-85">

    <thead>
        <tr>
            <th>CHOFER</th>
            <th>TRANSPORTE</th>
            <th>N° CARNET</th>
            <th>CARNET</th>
            <th>VTO. CARNET</th>
            <th>CARGA PELIGROSA</th>
            <th>VTO. CARGA PELIGROSA</th>
            <th>S.E.P.</th>
            <th>VTO. S.E.P.</th>
            <th>ACTUALIZAR IMAGENES</th>
            <th>EDITAR</th>
        </tr>
    </thead>

    <tbody>
        @foreach ($choferes as $datosChoferes)

        <?php

        $fechaDB1 = $datosChoferes->nro_carnet_vto;
        $fechaDB2 = $datosChoferes->carga_pelig_vto;
        $fechaDB3 = $datosChoferes->sep_vto;

        $fechaSet1 = Carbon::parse($fechaDB1);
        $fechaSet2 = Carbon::parse($fechaDB2);
        $fechaSet3 = Carbon::parse($fechaDB3);

        $fecha1 = $fechaSet1->format('d-m-Y');
        $fecha2 = $fechaSet2->format('d-m-Y');
        $fecha3 = $fechaSet3->format('d-m-Y');

        ?>
        <tr>
            <td>{{$datosChoferes->chofer}}</td>
            <td>{{$datosChoferes->id_transp}}</td>
            <td>{{$datosChoferes->nro_carnet}}</td>
            <td><a href="{{ route('vercarnet', ['id' => $datosChoferes->id]) }}">Ver</a></td>
            <td>{{$fecha1}}</td>
            <td><a href="{{ route('vercp', ['id' => $datosChoferes->id]) }}">Ver</a></td>
            <td>{{$fecha2}}</td>
            <td><a href="{{ route('versep', ['id' => $datosChoferes->id]) }}">Ver</a></td>
            <td>{{$fecha3}}</td>
            <td><a href="{{ route('actualizarimgchofer', ['id' => $datosChoferes->id]) }}">Actualizar</a></td>
            <td><a href="{{ route('editarchofer', ['id' => $datosChoferes->id]) }}">Editar</a></td>
        </tr>

        @endforeach
    </tbody>

</table>

@endsection