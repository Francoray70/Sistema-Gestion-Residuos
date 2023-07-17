<?php

use Illuminate\Support\Facades\Auth;

$user = Auth::user();
$userEmpresa = $user->empresa;

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
    <h2 class="mb-3">CARGAR IMAGENES DE MANIFIESTOS FIRMADOS</h2>
    <form action="{{url('/imagenesmanifiestostr')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label class="form-label">Nº de manifiesto</label>
            <input type="text" class="form-control w-75" name="numero" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Imagen del manifiesto</label>
            <input class="form-control w-75" name="foto" type="file" required>
        </div>
        <input type="text" value="{{$userEmpresa}}" name="empresa" style="display: none;" class="form-control w-75">

        <button type="submit" class="btn btn-primary">Cargar</button>
        <a href="{{url('/listaimgmanifiestos')}}"><button type="button" class="btn btn-primary">Listado</button></a>
    </form>
</div>

@endsection