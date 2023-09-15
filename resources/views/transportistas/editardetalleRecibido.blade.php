<?php

use Carbon\Carbon;

$fecha = Carbon::now();
?>

@extends('nav')

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script language="javascript">
    $(document).ready(function() {
        $("#transporte").change(function() {

            $('#manifiesto').find('option').remove().end().append('<option value="whatever"></option>').val('whatever');

            $("#transporte option:selected").each(function() {
                id_transp = $(this).val();
                $.post("{{asset('gets/getCorriente.php')}}", {
                    id_transp: id_transp
                }, function(data) {
                    $("#corriente").html(data);
                });
                $.post("{{asset('gets/getCorriente.php')}}", {
                    id_transp: id_transp
                }, function(data) {
                    $("#corriente1").html(data);
                });
                $.post("{{asset('gets/getCorriente.php')}}", {
                    id_transp: id_transp
                }, function(data) {
                    $("#corriente2").html(data);
                });
                $.post("{{asset('gets/getCorriente.php')}}", {
                    id_transp: id_transp
                }, function(data) {
                    $("#corriente3").html(data);
                });
            });
        })
    });
</script>

<script language="javascript">
    $(document).ready(function() {
        $("#corriente").change(function() {

            $('#kgslts').find('option').remove().end().append('<option value="whatever"></option>').val('whatever');

            $("#corriente option:selected").each(function() {
                id_corrientes = $(this).val();
                $.post("{{asset('gets/getKilos.php')}}", {
                    id_corrientes: id_corrientes
                }, function(data) {
                    $("#kgslts").html(data);
                });
                $.post("{{asset('gets/getEstados.php')}}", {
                    id_corrientes: id_corrientes
                }, function(data) {
                    $("#estado").html(data);
                });
                $.post("{{asset('gets/getDescripcion2.php')}}", {
                    id_corrientes: id_corrientes
                }, function(data) {
                    $("#descrr").html(data);
                });
            });
        });
    });
</script>

<style>
    .container {
        background-color: rgb(228, 228, 228);
        font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
    }
</style>

@section('navbar')
@foreach ($manifiesto as $datosManifiestos)

<div class="container w-95 border p-3 mt-5">
    <h2 class="mb-3">EDITAR DETALLE DE MANIFIESTO</h2>
    <form action="{{ url('/editarmanifiestodetallepararecibir/'.$datosManifiestos->id)}}" method="post">
        @method('PATCH')
        @csrf
        <table class="table table-light mt-4 w-95">

            <thead>
                <tr>
                    <th>Transporte</th>
                    <th>Corriente</th>
                    <th>Um</th>
                    <th>Estado</th>
                    <th>Cantidad</th>
                    <th>Descripcion ingreso</th>
                </tr>
            </thead>


            <tbody>

                <tr>
                    <td>
                        <select class="form-select w-85" id="transporte">
                            <option selected>Seleccionar</option>
                            @if (!empty($transporte))
                            @foreach ($transporte as $datosTransporte)
                            <option value="{{$datosTransporte->id_transp}}">{{$datosTransporte->id_transp}}</option>
                            @endforeach
                            @endif
                        </select>
                    </td>
                    <td>
                        <input class="form-control w-85" type="text" value="{{$datosManifiestos->id_corrientes}}" readonly>
                        <select name="corrientes" id="corriente" required class="form-select w-75">
                        </select>
                    </td>
                    <td>
                        <input class="form-control w-85" type="text" value="{{$datosManifiestos->um}}" readonly>
                        <select name="um" id="kgslts" required class="form-control w-75">
                        </select>
                    </td>
                    <td>
                        <input class="form-control w-85" type="text" value="{{$datosManifiestos->estado}}" readonly>
                        <select name="estado" id="estado" required class="form-control w-75">
                        </select>
                    </td>
                    <td>
                        <input class="form-control w-85" type="text" value="{{$datosManifiestos->cantidad}}" readonly>
                        <input class="form-control w-85" type="text" name="cantidad" required>
                    </td>
                    <td>
                        <input class="form-control w-85" type="text" value="{{$datosManifiestos->descr_ingreso}}" readonly>
                        <input class="form-control w-85" type="text" name="descr_ingreso" required>
                    </td>
                </tr>
                <select id="descrr" name="descripcion" style="display: none;"></select>

                <input type="text" value="{{$fecha}}" style="display: none;" name="fecha">
                <input type="text" value="{{$datosManifiestos->id}}" style="display: none;" name="id">
            </tbody>

        </table>

        <button type="submit" class="btn btn-primary">Actualizar</button>
        <a href="{{url('/recibirmanifiestoalm')}}"><button type="button" class="btn btn-primary">Cabeceras</button></a>
    </form>
    @endforeach
</div>

@endsection