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
    <h2 class="mb-3">ALTA DE ACTIVIDADES</h2>
    <form action="{{url('/actividades')}}" method="post">
        @csrf
        <div class="mb-3">
            <label class="form-label">Tipo de actividad</label>
            <input type="text" name="actividades" class="form-control w-75" required>
        </div>

        <input type="text" name="updated_at" value="{{$fecha}}" style="display: none;">

        <button type="submit" class="btn btn-primary">Cargar</button>
        <a href="{{url('/listaactividades')}}">
            <button type="button" class="btn btn-primary">Listado</button>
        </a>
    </form>
</div>

@endsection