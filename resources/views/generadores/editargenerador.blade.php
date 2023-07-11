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
    <h2 class="mb-3">EDITAR GENERADOR</h2>

    <form action="{{url('/generadores/'.$id->id)}}" method="POST">
        @method('PATCH')
        @csrf
        <div class="mb-3">
            <label class="form-label">Generador</label>
            <input type="text" value="{{$id->nom_comp}}" name="nom_comp" readonly class="form-control w-75">
        </div>
        <div class="mb-3">
            <label class="form-label">Cuit</label>
            <input type="text" value="{{$id->cuit}}" name="cuit" readonly class="form-control w-75">
        </div>
        <div class="mb-3">
            <label class="form-label">Tipo de IVA</label>
            <select class="form-select w-75" name="cod_iva">
                <option value="{{$id->cod_iva}}">{{$id->cod_iva}}</option>
                @if (($id->cod_iva) == 'Monotributo')
                <option value="Responsable inscripto">Responsable inscripto</option>
                @else
                <option value="Monotributo">Monotributo</option>
                @endif
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label">Dirección</label>
            <input type="text" value="{{$id->direccion}}" name="direccion" class="form-control w-75">
        </div>
        <div class="mb-3">
            <label class="form-label">Provincia</label>
            <input type="text" value="{{$id->provincia}}" name="provincia" readonly class="form-control w-75">
        </div>
        <div class="mb-3">
            <label class="form-label">Ciudad</label>
            <input type="text" value="{{$id->ciudad}}" name="ciudad" readonly class="form-control w-75">
        </div>
        <div class="mb-3">
            <label class="form-label">CP</label>
            <input type="text" value="{{$id->cod_postal}}" name="cod_postal" readonly class="form-control w-75">
        </div>
        <div class="mb-3">
            <label class="form-label">Nombre</label>
            <input type="text" value="{{$id->nom_cont}}" name="nom_cont" class="form-control w-75">
        </div>
        <div class="mb-3">
            <label class="form-label">Apellido</label>
            <input type="text" value="{{$id->ape_cont}}" name="ape_cont" class="form-control w-75">
        </div>
        <div class="mb-3">
            <label class="form-label">Actividad</label>
            <input type="text" value="{{$id->clte_act}}" name="clte_act" class="form-control w-75">
        </div>
        <div class="mb-3">
            <label class="form-label">Telefono</label>
            <input type="text" value="{{$id->num_tel}}" name="num_tel" class="form-control w-75">
        </div>
        <div class="mb-3">
            <label class="form-label">Celular</label>
            <input type="text" value="{{$id->num_cel}}" name="num_cel" class="form-control w-75">
        </div>
        <div class="mb-3">
            <label class="form-label">Habilitación provincial n°:</label>
            <input type="text" value="{{$id->cli_nro_hab_pro}}" name="cli_nro_hab_pro" class="form-control w-75">
        </div>
        <div class="mb-3">
            <label class="form-label">Habilitación provincial vto:</label>
            <input type="date" value="{{$id->cli_vto_hab_pro}}" name="cli_vto_hab_pro" class="form-control w-75">
        </div>
        <div class="mb-3">
            <label class="form-label">Habilitación nacional n°:</label>
            <input type="text" value="{{$id->cli_nro_hab_mun}}" name="cli_nro_hab_mun" class="form-control w-75">
        </div>
        <div class="mb-3">
            <label class="form-label">Habilitación nacional vto:</label>
            <input type="date" value="{{$id->cli_vto_hab_mun}}" name="cli_vto_hab_mun" class="form-control w-75">
        </div>
        <div class="mb-3">
            <label class="form-label">Habilitación comercial n°:</label>
            <input type="text" value="{{$id->cli_nro_hab_com}}" name="cli_nro_hab_com" class="form-control w-75">
        </div>
        <div class="mb-3">
            <label class="form-label">Habilitación comercial vto:</label>
            <input type="date" value="{{$id->cli_vto_hab_com}}" name="cli_vto_hab_com" class="form-control w-75">
        </div>
        <div class="mb-3">
            <label class="form-label">Email</label>
            <input type="email" value="{{$id->dir_correo}}" name="dir_correo" class="form-control w-75">
        </div>
        <div class="mb-3">
            <label class="form-label">Alta o baja*</label>
            <select class="form-select w-75" name="clte_act">
                <option value="{{$id->clte_act}}">{{$id->clte_act}}</option>
                @if (($id->clte_act) == 'ALTA')
                <option value="BAJA">BAJA</option>
                @else
                <option value="ALTA">ALTA</option>
                @endif
            </select>
        </div>


        <input type="text" value="{{$fecha}}" name="fecha_usu_modi" style="display: none;">
        <input type="text" value="{{$fecha}}" name="updated_at" style="display: none;">

        <button type="submit" class="btn btn-primary">Actualizar</button>
        <a href="{{url('/listagenerador')}}"><button type="button" class="btn btn-primary">Listado</button></a>
    </form>
</div>

@endsection