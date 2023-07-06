<?php

use App\Http\Controllers\GeneradorController;

?>

@extends('nav')

<style>
    .container {
        background-color: rgb(228, 228, 228);
    }
</style>

@section('navbar')

<div class="container w-85 border p-4 mt-5">
    <h2 class="mb-3">EDITAR GENERADOR</h2>

    <form action="" method="POST">
        @method('PATCH')
        @csrf
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Generador</label>
            <input type="text" value="{{$id->nom_comp}}" class="form-control w-75" id="exampleInputPassword1">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Cuit</label>
            <input type="text" value="{{$id->cuit}}" class="form-control w-75" id="exampleInputPassword1">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Tipo de IVA</label>
            <input type="text" value="{{$id->cod_iva}}" class="form-control w-75" id="exampleInputPassword1">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Dirección</label>
            <input type="text" value="{{$id->direccion}}" class="form-control w-75" id="exampleInputPassword1">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Provincia</label>
            <input type="text" value="{{$id->provincia}}" class="form-control w-75" id="exampleInputPassword1">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Ciudad</label>
            <input type="text" value="{{$id->ciudad}}" class="form-control w-75" id="exampleInputPassword1">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">CP</label>
            <input type="text" value="{{$id->cod_postal}}" class="form-control w-75" id="exampleInputPassword1">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Nombre</label>
            <input type="text" value="{{$id->nom_cont}}" class="form-control w-75" id="exampleInputPassword1">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Apellido</label>
            <input type="text" value="{{$id->ape_cont}}" class="form-control w-75" id="exampleInputPassword1">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Actividad</label>
            <input type="text" value="{{$id->clte_act}}" class="form-control w-75" id="exampleInputPassword1">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Telefono</label>
            <input type="text" value="{{$id->num_tel}}" class="form-control w-75" id="exampleInputPassword1">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Celular</label>
            <input type="text" value="{{$id->num_cel}}" class="form-control w-75" id="exampleInputPassword1">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Habilitación provincial n°:</label>
            <input type="text" value="{{$id->cli_nro_hab_pro}}" class="form-control w-75" id="exampleInputPassword1">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Habilitación provincial vto:</label>
            <input type="text" value="{{$id->cli_vto_hab_pro}}" class="form-control w-75" id="exampleInputPassword1">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Habilitación nacional n°:</label>
            <input type="text" value="{{$id->cli_nro_hab_mun}}" class="form-control w-75" id="exampleInputPassword1">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Habilitación nacional vto:</label>
            <input type="text" value="{{$id->cli_vto_hab_mun}}" class="form-control w-75" id="exampleInputPassword1">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Habilitación comercial n°:</label>
            <input type="text" value="{{$id->cli_nro_hab_com}}" class="form-control w-75" id="exampleInputPassword1">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Habilitación comercial vto:</label>
            <input type="text" value="{{$id->cli_vto_hab_com}}" class="form-control w-75" id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Email</label>
            <input type="email" value="{{$id->dir_correo}}" class="form-control w-75" id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Alta o Baja</label>
            <input type="text" value="{{$id->clte_act}}" class="form-control w-75" id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>
        <button type="submit" class="btn btn-primary">Cargar</button>
    </form>
</div>

@endsection