<?php

use Carbon\Carbon;

$fecha = Carbon::now();
?>

@extends('nav')

<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script language="javascript">
    $(document).ready(function() {
        $("#corriente").change(function() {

            $("#corriente option:selected").each(function() {
                id_corrientes = $(this).val();
                $.post("{{asset('gets/getDescripcion.php')}}", {
                    id_corrientes: id_corrientes
                }, function(data) {
                    $("#descripcion").html(data);
                });

                $.post("{{asset('gets/getUm2.php')}}", {
                    id_corrientes: id_corrientes
                }, function(data) {
                    $("#um").html(data);
                });

                $.post("{{asset('gets/getEstados.php')}}", {
                    id_corrientes: id_corrientes
                }, function(data) {
                    $("#estado").html(data);
                });

                $.post("{{asset('gets/getPeligrosidad.php')}}", {
                    id_corrientes: id_corrientes
                }, function(data) {
                    $("#peligrosidad").html(data);
                });

            });
        })
    });
</script>

<style>
    .container {
        background-color: rgb(228, 228, 228);
        font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
    }
</style>

@section('navbar')

<div class="container w-85 border p-4 mt-5">
    <h2 class="mb-3">ALTA DE CORRIENTES DE TRANSPORTES</h2>
    <form action="{{url('/corrientestransporte')}}" method="post">
        @csrf
        <div class="mb-3">
            <label class="form-label">Empresa de transporte</label>
            <select class="form-select w-75" name="id_transp" required>
                <option selected>Seleccionar transporte</option>
                @if (!empty($transporte))

                @foreach ($transporte as $datosTransporte)
                <option value="{{$datosTransporte->id_transp}}">{{$datosTransporte->id_transp}}</option>
                @endforeach

                @endif
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label">Corriente de residuo</label>
            <select class="form-select w-75" name="id_corrientes" id="corriente" required>
                <option selected>Seleccionar corriente</option>
                @if (!empty($corrientes))

                @foreach ($corrientes as $datosCorrientes)
                <option value="{{$datosCorrientes->id_corrientes}}">{{$datosCorrientes->id_corrientes}}</option>
                @endforeach

                @endif
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label">Descripcion</label>
            <select class="form-select w-75" name="descripcion" id="descripcion" required>
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label">Unidad de medida</label>
            <select class="form-select w-75" name="um" id="um" required>
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label">Estado</label>
            <select class="form-select w-75" name="estado" id="estado" required>
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label">Peligrosidad</label>
            <select class="form-select w-75" name="peligrosidad" id="peligrosidad" required>
            </select>
        </div>
        <input type="text" value="{{$fecha}}" name="updated_at" style="display: none;">

        <button type="submit" class="btn btn-primary">Cargar</button>
        <a href="{{url('/listacorrientestransportes')}}"><button type="button" class="btn btn-primary">Listado</button></a>
    </form>
</div>

@endsection