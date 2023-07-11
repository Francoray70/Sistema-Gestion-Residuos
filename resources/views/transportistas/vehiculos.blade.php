<?php

use Carbon\Carbon;

$fecha = Carbon::now();

?>

@extends('nav')

<style>
    .container {
        background-color: rgb(228, 228, 228);
    }
</style>

@section('navbar')


<div class="container w-85 border p-4 mt-5">
    <h2 class="mb-3">ALTA DE VEHÍCULOS</h2>
    <form action="{{url('/vehiculos')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label class="form-label">Patente</label>
            <input type="text" class="form-control w-75" name="id_patente" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Transporte</label>
            <select class="form-select w-75" name="id_transp" required>
                <option selected>Seleccione su transporte</option>
                @if (!empty($transporte))

                @foreach ($transporte as $datosTransporte)
                <option value="{{$datosTransporte->id_transp}}">{{$datosTransporte->id_transp}}</option>
                @endforeach

                @endif
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label">Vehiculo</label>
            <input type="text" class="form-control w-75" name="tipo_vehiculo" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Tipo de vehiculo</label>
            <input type="text" class="form-control w-75" name="descripcion_vehiculo" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Vencimiento de ruta</label>
            <input type="date" class="form-control w-75" name="pat_rut_vto" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Imagen de ruta</label>
            <input class="form-control w-75" type="file" name="pat_rut" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Titulo de propiedad</label>
            <input class="form-control w-75" type="file" name="pat_tit" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Cedula verde</label>
            <input class="form-control w-75" type="file" name="pat_ced_verde" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Vencimiento de la V.T.V.</label>
            <input type="date" class="form-control w-75" name="pat_vtv_vto" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Imagen de la V.T.V.</label>
            <input class="form-control w-75" type="file" name="pat_vtv_img" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Nº de registro de la carga peligrosa</label>
            <input type="text" class="form-control w-75" name="pat_cpel_nro" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Imagen de la carga peligrosa</label>
            <input class="form-control w-75" type="file" name="pat_cpel_img" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Vencimiento de la carga peligrosa</label>
            <input type="date" class="form-control w-75" name="pat_cpel_vto" required>
        </div>

        <input type="text" value="{{$fecha}}" name="fecha_usu_alta" style="display: none;">
        <input type="text" value="{{$fecha}}" name="fecha_usu_modif" style="display: none;">
        <input type="text" value="{{$fecha}}" name="updated_at" style="display: none;">
        <input type="text" value="ALTA" name="camio_act" style="display: none;">

        <button type="submit" class="btn btn-primary">Cargar</button>
        <a href="{{url('/listavehiculos')}}"><button type="button" class="btn btn-primary">Listado</button></a>
    </form>
</div>

@endsection