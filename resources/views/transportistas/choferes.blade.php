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
    <h2 class="mb-3">ALTA DE CHOFERES</h2>
    <form action="{{url('/choferes')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label class="form-label">Chofer</label>
            <input type="text" class="form-control w-75" name="chofer" required>
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
            <label class="form-label">Nº de carnet profesional</label>
            <input type="text" class="form-control w-75" name="nro_carnet" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Imagen del carnet</label>
            <input class="form-control w-75" type="file" name="nro_carnet_img" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Vencimiento del carnet</label>
            <input type="date" class="form-control w-75" name="nro_carnet_vto" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Imagen de carga peligrosa</label>
            <input class="form-control w-75" type="file" name="carga_pelig_img" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Vencimiento de carga peligrosa</label>
            <input type="date" class="form-control w-75" name="carga_pelig_vto" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Imagen del S.E.P.</label>
            <input class="form-control w-75" type="file" name="sep_img" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Vencimiento del S.E.P.</label>
            <input type="date" class="form-control w-75" name="sep_vto" required>
        </div>

        <input type="text" value="{{$fecha}}" name="fecha_usu_alta" style="display: none;">
        <input type="text" value="{{$fecha}}" name="fecha_usu_modif" style="display: none;">
        <input type="text" value="{{$fecha}}" name="updated_at" style="display: none;">
        <input type="text" value="ALTA" name="chofer_act" style="display: none;">

        <button type="submit" class="btn btn-primary">Cargar</button>
        <a href="{{url('/listachoferes')}}"><button type="button" class="btn btn-primary">Listado</button></a>
    </form>
</div>

@endsection