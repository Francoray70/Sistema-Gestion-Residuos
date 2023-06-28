<?php

use App\http\Controllers\ActividadesController;

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
    <form>
        @csrf
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Tipo de actividad</label>
            <input type="password" class="form-control w-75" id="exampleInputPassword1">
        </div>


        <button type="submit" class="btn btn-primary">Cargar</button>
        <a href="{{url('/listaactividades')}}">
            <button type="button" class="btn btn-primary">Listado</button>
        </a>
    </form>
</div>

@endsection