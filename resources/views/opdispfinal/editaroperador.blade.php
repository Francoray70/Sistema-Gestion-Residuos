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
    <h2 class="mb-3">ALTA DE OPERADOR DE DISPOSICIÓN FINAL</h2>
    <form action="{{url('/opdispfinal/'.$id->id)}}" method="post">
        @method('PATCH')
        @csrf
        <div class="mb-3">
            <label class="form-label">Operador de disposición final</label>
            <input type="text" name="id_operador_df" value="{{$id->id_operador_df}}" class="form-control w-75" readonly required>
        </div>
        <div class="mb-3">
            <label class="form-label">CUIT</label>
            <input type="text" name="cuit_odf" value="{{$id->cuit_odf}}" class="form-control w-75" readonly required>
        </div>
        <div class="mb-3">
            <label class="form-label">Direccion*</label>
            <input type="text" name="direc_odf" value="{{$id->direc_odf}}" class="form-control w-75" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Provincia</label>
            <input type="text" name="prov_odf" value="{{$id->prov_odf}}" class="form-control w-75" readonly required>
        </div>
        <div class="mb-3">
            <label class="form-label">Ciudad</label>
            <input type="text" name="local_odf" value="{{$id->local_odf}}" class="form-control w-75" readonly required>
        </div>
        <div class="mb-3">
            <label class="form-label">Codigo postal</label>
            <input type="text" name="cpodf" value="{{$id->cpodf}}" class="form-control w-75" readonly required>
        </div>
        <div class="mb-3">
            <label class="form-label">Telefono*</label>
            <input type="text" name="tel_odf" value="{{$id->tel_odf}}" class="form-control w-75" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Ubicacion tratamiento*</label>
            <input type="text" name="ubi_odf" value="{{$id->ubi_odf}}" class="form-control w-75" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Email*</label>
            <input type="email" name="email_odf" value="{{$id->email_odf}}" class="form-control w-75" required>
        </div>
        <div class="mb-3">
            <label class="form-label">CDF inicial*</label>
            <input type="number" name="cdf_inicial" value="{{$id->cdf_inicial}}" class="form-control w-75" required>
        </div>
        <div class="mb-3">
            <label class="form-label">CDF final*</label>
            <input type="number" name="cdf_final" value="{{$id->cdf_final}}" class="form-control w-75" required>
        </div>
        <div class="mb-3">
            <label class="form-label">CDF actual*</label>
            <input type="number" name="cdf_actual" value="{{$id->cdf_actual}}" class="form-control w-75" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Habilitación municipal nº*</label>
            <input type="text" name="hab_mun_nro_odf" value="{{$id->hab_mun_nro_odf}}" class="form-control w-75" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Habilitación municipal vto*</label>
            <input type="date" name="hab_mun_vto_odf" value="{{$id->hab_mun_vto_odf}}" class="form-control w-75" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Habilitación provincial n°*</label>
            <input type="text" name="hab_pro_nro_odf" value="{{$id->hab_pro_nro_odf}}" class="form-control w-75" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Habilitación provincial vto*</label>
            <input type="date" name="hab_pro_vto_odf" value="{{$id->hab_pro_vto_odf}}" class="form-control w-75" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Habilitación nacional n°*</label>
            <input type="text" name="nro_hab_nac" value="{{$id->nro_hab_nac}}" class="form-control w-75" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Habilitación nacional vto*</label>
            <input type="date" name="vto_hab_nac" value="{{$id->vto_hab_nac}}" class="form-control w-75" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Alta o baja*</label>
            <select class="form-select w-75" name="cdf_act">
                <option value="{{$id->cdf_act}}">{{$id->cdf_act}}</option>
                @if (($id->cdf_act) == 'ALTA')
                <option value="BAJA">BAJA</option>
                @else
                <option value="ALTA">ALTA</option>
                @endif
            </select>
        </div>

        <input type="text" name="fecha_usu_alta" value="{{$fecha}}" style="display: none;">
        <input type="text" name="fecha_usu_modi" value="{{$fecha}}" style="display: none;">
        <input type="text" name="updated_at" value="{{$fecha}}" style="display: none;">

        <button type="submit" class="btn btn-primary">Actualizar</button>
        <a href="{{url('/listaodf')}}">
            <button type="button" class="btn btn-primary">Listado</button>
        </a>
    </form>
</div>

@endsection