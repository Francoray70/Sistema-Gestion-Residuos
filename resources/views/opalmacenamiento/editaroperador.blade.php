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
    <h2 class="mb-3">ALTA DE OPERADOR DE ALMACENAMIENTO</h2>
    <form action="{{url('/opalmacenamiento/'.$id->id)}}" method="post">
        @method('PATCH')
        @csrf
        <div class="mb-3">
            <label class="form-label">Razon social</label>
            <input type="text" name="gener_nom" value="{{$id->gener_nom}}" class="form-control w-75" readonly required>
        </div>
        <div class="mb-3">
            <label class="form-label">CUIT</label>
            <input type="text" name="gener_cuit" value="{{$id->gener_cuit}}" class="form-control w-75" readonly required>
        </div>
        <div class="mb-3">
            <label class="form-label">Direccion*</label>
            <input type="text" name="gener_dir" value="{{$id->gener_dir}}" class="form-control w-75" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Provincia</label>
            <input type="text" name="gener_prov" value="{{$id->gener_prov}}" class="form-control w-75" readonly required>
        </div>
        <div class="mb-3">
            <label class="form-label">Ciudad</label>
            <input type="text" name="gener_ciu" value="{{$id->gener_ciu}}" class="form-control w-75" readonly required>
        </div>
        <div class="mb-3">
            <label class="form-label">CP</label>
            <input type="text" name="gener_cp" value="{{$id->gener_cp}}" class="form-control w-75" readonly required>
        </div>
        <div class="mb-3">
            <label class="form-label">Telefono*</label>
            <input type="text" name="gener_tel" value="{{$id->gener_tel}}" class="form-control w-75" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Ubicacion planta*</label>
            <input type="text" name="gener_ubi" value="{{$id->gener_ubi}}" class="form-control w-75" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Email*</label>
            <input type="email" name="gener_mail" value="{{$id->gener_mail}}" class="form-control w-75" required>
        </div>
        <div class="mb-3">
            <label class="form-label">RPG inicial*</label>
            <input type="number" name="rpg_inicial" value="{{$id->rpg_inicial}}" class="form-control w-75" required>
        </div>
        <div class="mb-3">
            <label class="form-label">RPG final*</label>
            <input type="number" name="rpg_final" value="{{$id->rpg_final}}" class="form-control w-75" required>
        </div>
        <div class="mb-3">
            <label class="form-label">RPG actual*</label>
            <input type="number" name="rpg_actual" value="{{$id->rpg_actual}}" class="form-control w-75" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Habilitación municipal nº*</label>
            <input type="text" name="gener_nro_hab_mun" value="{{$id->gener_nro_hab_mun}}" class="form-control w-75" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Habilitación municipal vto*</label>
            <input type="date" name="gener_vto_hab_mun" value="{{$id->gener_vto_hab_mun}}" class="form-control w-75" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Habilitación provincial n°*</label>
            <input type="text" name="gener_nro_hab_pro" value="{{$id->gener_nro_hab_pro}}" class="form-control w-75" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Habilitación provincial vto*</label>
            <input type="date" name="gener_vto_hab_pro" value="{{$id->gener_vto_hab_pro}}" class="form-control w-75" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Habilitación nacional n°*</label>
            <input type="text" name="gener_nro_hab_nac" value="{{$id->gener_nro_hab_nac}}" class="form-control w-75" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Habilitación nacional vto*</label>
            <input type="date" name="gener_vto_hab_nac" value="{{$id->gener_vto_hab_nac}}" class="form-control w-75" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Operador por disposicion final*</label>
            <select class="form-select w-75" name="dispfinal">
                <option value="{{$id->dispfinal}}">{{$id->dispfinal}}</option>
                @if (($id->dispfinal) == 'SI')
                <option value="NO">NO</option>
                @else
                <option value="SI">SI</option>
                @endif
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label">Alta o baja*</label>
            <select class="form-select w-75" name="gener_act">
                <option value="{{$id->gener_act}}">{{$id->gener_act}}</option>
                @if (($id->gener_act) == 'ALTA')
                <option value="BAJA">BAJA</option>
                @else
                <option value="ALTA">ALTA</option>
                @endif
            </select>
        </div>

        <input type="text" value="{{$fecha}}" name="fecha_usu_mod" style="display: none;">
        <input type="text" name="updated_at" value="{{$fecha}}" style="display: none;">

        <button type="submit" class="btn btn-primary">Cargar</button>
        <a href="{{url('/listaopalm')}}">
            <button type="button" class="btn btn-primary">Listado</button>
        </a>
    </form>
</div>

@endsection