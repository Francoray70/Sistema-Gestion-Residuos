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
    <h2 class="mb-3">ALTA DE LOCALIDADES</h2>
    <form action="{{url('/localidades')}}" method="post">
        @csrf
        <div class="mb-3">
            <label class="form-label">Provincia</label>
            <select class="form-select w-75" name="provincia" required>
                <option selected>Seleccione su provincia</option>
                @if (!empty($provincias))
                @foreach ($provincias as $datosProvincias)
                <option value="{{$datosProvincias->provincia}}">{{$datosProvincias->provincia}}</option>
                @endforeach
                @endif
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label">Ciudad</label>
            <input type="text" class="form-control w-75" name="ciudades" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Codigo postal</label>
            <input type="text" class="form-control w-75" name="cp" required>
        </div>
        <input type="text" value="{{$fecha}}" name="updated_at" style="display: none;">

        <button type="submit" class="btn btn-primary">Cargar</button>
        <a href="{{url('/listalocalidades')}}">
            <button type="button" class="btn btn-primary">Listado</button>
        </a>
    </form>
</div>

@endsection