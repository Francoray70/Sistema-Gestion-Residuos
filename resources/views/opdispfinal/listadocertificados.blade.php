<?php

use App\Models\certificadodetalle;
?>

@extends('nav')

<style>
    .table {
        background-color: rgb(228, 228, 228);
        font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
    }
</style>

@section('navbar')

<form action="{{url('/excelcertifodf')}}" method="get">
    <h2 class="mt-3">LISTA DE CERTIFICADOS DE OPERADORAS DE DISPOSICIÓN FINAL</h2>
    <table class="table table-light mt-4 w-85">

        <thead>
            <tr>
                <th>N° CERTIFICADO</th>
                <th>N° MANIFIESTO</th>
                <th>OPERADOR</th>
                <th>FECHA ALTA</th>
                <th>GENERADOR</th>
                <th>CORRIENTE</th>
                <th>UM</th>
                <th>CANTIDAD</th>
                <th>ESTADO</th>
                <th>TRANSPORTISTA</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($resultados as $datosCertificadosCabecera)
            <?php
            $detalles = certificadodetalle::where('numero_certif', $datosCertificadosCabecera->nro_cert_disp_final)->get();
            ?>
            @if(!empty($detalles))
            @foreach ($detalles as $datosCertificadosDetalles)

            <tr>
                <td>{{$datosCertificadosCabecera->nro_cert_disp_final}}</td>
                <td>{{$datosCertificadosCabecera->num_manifiesto}}</td>
                <td>{{$datosCertificadosCabecera->opdfinal}}</td>
                <td>{{$datosCertificadosCabecera->fechacertificado}}</td>
                <td>{{$datosCertificadosCabecera->generador}}</td>


                <td>{{$datosCertificadosDetalles->corriente}}</td>
                <td>{{$datosCertificadosDetalles->um}}</td>
                <td>{{$datosCertificadosDetalles->cantidad}}</td>
                <td>{{$datosCertificadosDetalles->estado}}</td>
                <td>{{$datosCertificadosDetalles->transportista}}</td>
            </tr>

            @endforeach
            @endif
            @endforeach
        </tbody>

        <input type="text" value="{{$operador}}" style="display: none;" name="operador">
        <input type="date" value="{{$fechaInicio}}" style="display: none;" name="fechainicio">
        <input type="date" value="{{$fechaFinal}}" style="display: none;" name="fechafinal">

    </table>
    <input type="submit" class="btn btn-primary mt-4 ml-4" value="Descargar excel">

    @endsection