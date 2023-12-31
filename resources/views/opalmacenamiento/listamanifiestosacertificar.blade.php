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
<form action="{{url('/cargarpg')}}" method="post">
    @method('PATCH')
    @csrf
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
                <th>ESTADO</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($resultados as $datosManifiestoCabecera)
            <?php
            $detalles = manifiestodet::where('id_manifies', $datosManifiestoCabecera->id_manifiesto)
                ->where('simp_multi', '=', 'UNO')
                ->where('nro_cert_disp_final', '<>', '')
                ->where('rpg', '=', '')
                ->get();
            $fechaDB = $datosManifiestoCabecera->fecha_alta_manif;

            $fechaSet1 = Carbon::parse($fechaDB);

            $fechaAlta = $fechaSet1->format('d-m-Y');
            ?>

            @if(!empty($detalles))
            @foreach ($detalles as $datosManifiestoDetalles)

            <input type="text" name="certirpg" style="display: none;" value="{{$rpg}}">
            <td><input type="checkbox" name="id" value="{{$datosManifiestoDetalles->id}}"></td>
            <td><input type="text" readonly name="manifiestoreal" value="{{$datosManifiestoDetalles->id_manifies}}"></td>
            <td><input type="text" readonly name="generador" value="{{$datosManifiestoCabecera->nom_comp}}"></td>
            <td>{{$fechaAlta}}</td>
            <td>{{$datosManifiestoCabecera->id_transp}}</td>
            <td><input type="text" readonly name="operador" value="{{$datosManifiestoCabecera->gener_nom}}"></td>

            <td>{{$datosManifiestoDetalles->estado_det_manif}}</td>
            <td>{{$datosManifiestoDetalles->id_corrientes}}</td>
            <td>{{$datosManifiestoDetalles->um}}</td>
            <td>{{$datosManifiestoDetalles->cantidad}}</td>
            <td><input type="text" readonly name="manifiesto" value="{{$datosManifiestoDetalles->id_man_tra_nac}}"></td>
            <td><input type="text" readonly name="certificado" value="{{$datosManifiestoDetalles->nro_cert_disp_final}}"></td>
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