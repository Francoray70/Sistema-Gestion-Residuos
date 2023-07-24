<?php

use App\Models\manifiestodet;
?>

@extends('nav')

<style>
    .table {
        background-color: rgb(228, 228, 228);
        font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
    }
</style>

@section('navbar')
<form action="">
    <h2 class="mt-3">LISTA DE MANIFIESTOS A CERTIFICAR</h2>
    <table class="table table-light mt-4 w-85">

        <thead>
            <tr>
                <th>SELECCIONAR</th>
                <th>N° MANIFIESTO</th>
                <th>GENERADOR</th>
                <th>FECHA</th>
                <th>TRANSPORTE</th>
                <th>OPERADOR D.F.</th>
                <th>ESTADO MANIFIESTO</th>
                <th>CORRIENTE</th>
                <th>UM</th>
                <th>VOLUMEN</th>
                <th>MANIF. P/DISP. FINAL</th>
                <th>CERTIF. DISP. FINAL</th>
                <th>TRANSP. DISP. FINAL</th>
                <th>ESTADO</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($resultados as $datosManifiestoCabecera)
            <?php
            $detalles = manifiestodet::where('id_manifies', $datosManifiestoCabecera->id_manifiesto)
                ->where('simp_multi', '=', 'UNO')
                ->where('nro_cert_disp_final', '<>', '')
                ->where('rpg', '<>', '')
                ->get();
            ?>

            @if(!empty($detalles))
            @foreach ($detalles as $datosManifiestoDetalles)

            <tr>
                <td><input type="checkbox" name="manifiestoSeleccion" value="{{$datosManifiestoCabecera->id}}"></td>
                <td>{{$datosManifiestoCabecera->id_manifiesto}}</td>
                <td>{{$datosManifiestoCabecera->nom_comp}}</td>
                <td>{{$datosManifiestoCabecera->fecha_alta_manif}}</td>
                <td>{{$datosManifiestoCabecera->id_transp}}</td>
                <td>{{$datosManifiestoCabecera->gener_nom}}</td>

                <td>{{$datosManifiestoDetalles->estado_det_manif}}</td>
                <td>{{$datosManifiestoDetalles->id_corrientes}}</td>
                <td>{{$datosManifiestoDetalles->um}}</td>
                <td>{{$datosManifiestoDetalles->cantidad}}</td>
                <td>{{$datosManifiestoDetalles->id_man_tra_nac}}</td>
                <td>{{$datosManifiestoDetalles->nro_cert_disp_final}}</td>
                <td>{{$datosManifiestoDetalles->nro_cert_disp_final}}</td>
                <td>{{$datosManifiestoDetalles->estadooo}}</td>
            </tr>

            @endforeach
            @endif
            @endforeach
        </tbody>



    </table>

    <input type="submit" value="Dar de alta" class="btn btn-primary mt-4 ml-4">
</form>

@endsection