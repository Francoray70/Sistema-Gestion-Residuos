<?php

use App\Models\certificadodetalle;
?>

@extends('nav')

<style>
    .container {
        background-color: rgb(228, 228, 228);
    }
</style>

@section('navbar')

<h2 class="mt-3">LISTA DE MANIFIESTOS DE OPERADORAS DE DISPOSICIÓN FINAL</h2>
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


</table>

@endsection