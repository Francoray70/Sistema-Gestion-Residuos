<?php

use Carbon\Carbon;

$fecha = Carbon::now();
?>

@extends('nav')

<style>
    .container {
        background-color: rgb(228, 228, 228);
        font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
    }
</style>

@section('navbar')

<div class="container w-85 border p-4 mt-5">
    <h2 class="mb-3">EDITAR VEHICULO</h2>
    <form action="{{url('/vehiculos/'.$id->id)}}" method="post">
        @method('PATCH')
        @csrf
        <div class="mb-3">
            <label class="form-label">Patente</label>
            <input type="text" class="form-control w-75" value="{{$id->id_patente}}" name="id_patente" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Transporte</label>
            <input type="text" class="form-control w-75" value="{{$id->id_transp}}" name="id_transp" readonly required>
        </div>
        <div class="mb-3">
            <label class="form-label">Vehiculo</label>
            <input type="text" class="form-control w-75" name="tipo_vehiculo" value="{{$id->tipo_vehiculo}}" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Tipo de vehiculo</label>
            <input type="text" class="form-control w-75" name="descripcion_vehiculo" value="{{$id->descripcion_vehiculo}}" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Vencimiento de ruta</label>
            <input type="date" class="form-control w-75" name="pat_rut_vto" value="{{$id->pat_rut_vto}}" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Vencimiento de la V.T.V.</label>
            <input type="date" class="form-control w-75" name="pat_vtv_vto" value="{{$id->pat_vtv_vto}}" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Nº de registro de la carga peligrosa</label>
            <input type="text" class="form-control w-75" name="pat_cpel_nro" value="{{$id->pat_cpel_nro}}" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Vencimiento de la carga peligrosa</label>
            <input type="date" class="form-control w-75" name="pat_cpel_vto" value="{{$id->pat_cpel_vto}}" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Alta o baja*</label>
            <select class="form-select w-75" name="camio_act">
                <option value="{{$id->camio_act}}">{{$id->camio_act}}</option>
                @if (($id->camio_act) == 'ALTA')
                <option value="BAJA">BAJA</option>
                @else
                <option value="ALTA">ALTA</option>
                @endif
            </select>
        </div>

        <input type="text" value="{{$fecha}}" name="fecha_usu_modif" style="display: none;">
        <input type="text" value="{{$fecha}}" name="updated_at" style="display: none;">

        <button type="submit" class="btn btn-primary">Actualizar</button>
        <a href="{{url('/listavehiculos')}}"><button type="button" class="btn btn-primary">Listado</button></a>
    </form>
</div>

@endsection