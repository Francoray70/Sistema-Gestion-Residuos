<?php

use Carbon\Carbon;

$fecha = Carbon::now();

?>

@extends('nav')

<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script language="javascript">
    $(document).ready(function() {
        $("#provincia").change(function() {

            $("#provincia option:selected").each(function() {
                provincia = $(this).val();
                $.post("{{asset('gets/getCiudad.php')}}", {
                    provincia: provincia
                }, function(data) {
                    $("#ciudades").html(data);
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
    <h2 class="mb-3">ALTA DE DIRECCIONES DE RETIRO</h2>
    <form action="{{url('/direccionesgenerador')}}" method="post">
        @csrf
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Generador</label>
            <select class="form-select w-75" name="nom_comp">
                <option selected>Seleccionar generador</option>
                @if (!empty($generador))
                @foreach ($generador as $datosGenerador)
                <option value="{{$datosGenerador->nom_comp}}">{{$datosGenerador->nom_comp}}</option>
                @endforeach
                @endif
            </select>
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Direccion de retiro</label>
            <input type="text" class="form-control w-75" name="dir_de_retiro">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Provincia</label>
            <select class="form-select w-75" name="provincia" id="provincia">
                <option selected>Seleccione su provincia</option>
                @if (!empty($provincias))
                @foreach ($provincias as $datosProvincia)
                <option value="{{$datosProvincia->provincia}}">{{$datosProvincia->provincia}}</option>
                @endforeach
                @endif
            </select>
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Ciudad</label>
            <select class="form-select w-75" name="ciudad" id="ciudades">
            </select>
        </div>

        <input type="text" value="{{$fecha}}" name="updated_at" style="display: none;">

        <button type="submit" class="btn btn-primary">Cargar</button>
        <a href="{{url('/listadirecciones')}}"><button type="button" class="btn btn-primary">Listado</button></a>
    </form>
</div>

@endsection