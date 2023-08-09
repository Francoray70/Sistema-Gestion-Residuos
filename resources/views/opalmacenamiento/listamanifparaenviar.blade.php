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

<h2 class="mt-3">LISTA DE MANIFIESTOS PARA ENVIO A DISPOSICIÓN FINAL</h2>
<form action="{{url('/enviarmanifiestoalma')}}" method="post">
    @method('PATCH')
    @csrf
    <table class="table table-light mt-4 w-85">

        <thead>
            <tr>
                <th>SELECCIONAR</th>
                <th>N° MANIFIESTO</th>
                <th>GENERADOR</th>
                <th>FECHA</th>
                <th>CORRIENTE</th>
                <th>UM</th>
                <th>CANTIDAD</th>
                <th>TIPO</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($resultados as $datosManifiestoCabecera)
            <?php
            $detalles = manifiestodet::where('id_manifies', $datosManifiestoCabecera->id_manifiesto)
                ->where('um', 'LIKE', '%' . $um . '%')
                ->where('simp_multi', 'LIKE', '%' . 'UNO' . '%')
                ->where('estadooo', 'LIKE', '%' . 'ALTA' . '%')
                ->where('id_man_tra_nac', '=', '')
                ->get();
            ?>

            @if(!empty($detalles))
            @foreach ($detalles as $datosManifiestoDetalles)

            <tr>
                <td><input type="checkbox" name="manifiestoId[]" value="{{$datosManifiestoDetalles->id}}"></td>
                <td>{{$datosManifiestoCabecera->id_manifiesto}}</td>
                <td>{{$datosManifiestoCabecera->nom_comp}}</td>
                <td>{{$datosManifiestoCabecera->fecha_alta_manif}}</td>

                <td>{{$datosManifiestoDetalles->id_corrientes}}</td>
                <td><input type="text" name="um" readonly value="{{$datosManifiestoDetalles->um}}"></td>
                <td>{{$datosManifiestoDetalles->cantidad}}</td>
                <td>{{$datosManifiestoDetalles->simp_multi}}</td>
            </tr>

            @endforeach
            @endif
            @endforeach
        </tbody>



    </table>


    @foreach ($resultado2 as $datosOtroManif)
    <?php

    $detalles2 = manifiestodet::where('id_manifies', $datosOtroManif->id_manifiesto)
        ->where('um', 'LIKE', '%' . $um . '%')
        ->where('nro_cert_disp_final', '=', '')
        ->get();

    ?>

    <select name="manifiestoSeleccion" class="form-select w-50">
        <option selected>Seleccione manifiesto para envio</option>

        @if ($detalles2)
        @foreach ($detalles2 as $datosOtroManifDet)
        <option value="{{$datosOtroManifDet->id_manifies}}">{{$datosOtroManifDet->id_manifies}} / {{$datosOtroManifDet->id_corrientes}}</option>
        @endforeach
        @endif
    </select>
    @endforeach
    <input type="submit" class="btn btn-primary mt-4 ml-4" value="Enviar">
</form>

@endsection