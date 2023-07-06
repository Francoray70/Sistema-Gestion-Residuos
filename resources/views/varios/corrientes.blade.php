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
    <h2 class="mb-3">ALTA DE CORRIENTES DE RESIDUOS</h2>
    <form action="{{url('/corrientesderesiduos')}}" method="post">
        @csrf
        <div class="mb-3">
            <label class="form-label">Corriente</label>
            <input type="text" class="form-control w-75" name="id_corrientes" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Descripcion</label>
            <input type="text" class="form-control w-75" name="desc_corrientes" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Unidad de medida</label>
            <select class="form-select w-75" name="um" required>
                <option selected>Seleccione la unidad</option>
                <option value="KGs">Kilogramos</option>
                <option value="Lts">Litros</option>
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label">Estado</label>
            <select class="form-select w-75" name="estado_cte" required>
                <option selected>Seleccione el estado</option>
                <option value="Solido">Solido</option>
                <option value="Liquido">Liquido</option>
                <option value="Semi solido">Semi solido</option>
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label">Peligrosidad</label>
            <input type="text" class="form-control w-75" name="peligrosidad" required>
        </div>

        <input type="text" value="{{$fecha}}" name="updated_at" style="display: none;">

        <button type="submit" class="btn btn-primary">Cargar</button>
        <a href="{{url('/listacorrientes')}}">
            <button type="button" class="btn btn-primary">Listado</button>
        </a>
    </form>
</div>

@endsection