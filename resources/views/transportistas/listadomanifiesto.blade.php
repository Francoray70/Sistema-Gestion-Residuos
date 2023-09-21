<?php

use App\Models\manifiestodet;
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

<form action="{{url('/exceltransporte')}}" method="get">
    <h2 class="mt-3">LISTA DE MANIFIESTOS DE TRANSPORTISTAS</h2>
    <table class="table table-light mt-4 w-85">

        <thead>
            <tr>
                <th>N° MANIFIESTO</th>
                <th>FECHA MANIFIESTOS</th>
                <th>GENERADOR</th>
                <th>CHOFER</th>
                <th>DOMINIO</th>
                <th>OPERADORA</th>
                <th>CORRIENTE</th>
                <th>CANTIDAD</th>
                <th>UM</th>
                <th>ESTADO</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($resultados as $datosManifiestoCabecera)
            <?php
            $detalles = manifiestodet::where('id_manifies', $datosManifiestoCabecera->id_manifiesto)->get();
            $fechaDB = $datosManifiestoCabecera->fecha_alta_manif;

            $fechaSet1 = Carbon::parse($fechaDB);

            $fechaAlta = $fechaSet1->format('d-m-Y');
            ?>
            @if(!empty($detalles))
            @foreach ($detalles as $datosManifiestoDetalles)

            <tr>
                <td>{{$datosManifiestoCabecera->id_manifiesto}}</td>
                <td>{{$fechaAlta}}</td>
                <td>{{$datosManifiestoCabecera->nom_comp}}</td>
                <td>{{$datosManifiestoCabecera->chofer}}</td>
                <td>{{$datosManifiestoCabecera->id_patente}}</td>
                <td>{{$datosManifiestoCabecera->gener_nom}}</td>

                <td>{{$datosManifiestoDetalles->id_corrientes}}</td>
                <td>{{$datosManifiestoDetalles->cantidad}}</td>
                <td>{{$datosManifiestoDetalles->um}}</td>
                <td>{{$datosManifiestoDetalles->estadooo}}</td>
            </tr>

            @endforeach
            @endif
            @endforeach
        </tbody>


        <input type="text" value="{{$transporte}}" style="display: none;" name="transporte">
        <input type="date" value="{{$fechaInicio}}" style="display: none;" name="fechainicio">
        <input type="date" value="{{$fechaFinal}}" style="display: none;" name="fechafinal">
    </table>
    <input type="submit" class="btn btn-primary mt-4 ml-4" value="Descargar excel">
</form>

@endsection