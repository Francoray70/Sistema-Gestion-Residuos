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
    <h2 class="mb-3">EDITAR CHOFER</h2>
    <form action="{{url('/choferes/'.$id->id)}}" method="post">
        @method('PATCH')
        @csrf
        <div class="mb-3">
            <label class="form-label">Chofer*</label>
            <input type="text" class="form-control w-75" value="{{$id->chofer}}" name="chofer" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Transporte</label>
            <input type="text" class="form-control w-75" value="{{$id->id_transp}}" name="id_transp" readonly required>
        </div>
        <div class="mb-3">
            <label class="form-label">Nº de carnet profesional*</label>
            <input type="text" class="form-control w-75" name="nro_carnet" value="{{$id->nro_carnet}}" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Vencimiento del carnet*</label>
            <input type="date" class="form-control w-75" name="nro_carnet_vto" value="{{$id->nro_carnet_vto}}" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Vencimiento de carga peligrosa*</label>
            <input type="date" class="form-control w-75" name="carga_pelig_vto" value="{{$id->carga_pelig_vto}}" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Vencimiento del S.E.P.*</label>
            <input type="date" class="form-control w-75" name="sep_vto" value="{{$id->sep_vto}}" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Alta o baja*</label>
            <select class="form-select w-75" name="chofer_act">
                <option value="{{$id->chofer_act}}">{{$id->chofer_act}}</option>
                @if (($id->chofer_act) == 'ALTA')
                <option value="BAJA">BAJA</option>
                @else
                <option value="ALTA">ALTA</option>
                @endif
            </select>
        </div>

        <input type="text" value="{{$fecha}}" name="fecha_usu_modif" style="display: none;">
        <input type="text" value="{{$fecha}}" name="updated_at" style="display: none;">

        <button type="submit" class="btn btn-primary">Actualizar</button>
        <a href="{{url('/listachoferes')}}"><button type="button" class="btn btn-primary">Listado</button></a>
    </form>
</div>

@endsection