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
    <h2 class="mb-3">ALTA DE TRANSPORTES</h2>
    <form action="{{url('/transportistas/'.$id->id)}}" method="POST">
        @method('PATCH')
        @csrf
        <div class="mb-3">
            <label class="form-label">Transporte</label>
            <input type="text" name="id_transp" value="{{$id->id_transp}}" class="form-control w-75" readonly required>
        </div>
        <div class="mb-3">
            <label class="form-label">CUIT</label>
            <input type="text" name="cuit_trans" value="{{$id->cuit_trans}}" class="form-control w-75" readonly required>
        </div>
        <div class="mb-3">
            <label class="form-label">Direccion*</label>
            <input type="text" name="direc_transp" value="{{$id->direc_transp}}" class="form-control w-75" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Provincia</label>
            <input type="text" name="prov_transp" value="{{$id->prov_transp}}" class="form-control w-75" readonly required>
        </div>
        <div class="mb-3">
            <label class="form-label">Ciudad</label>
            <input type="text" name="local_transp" value="{{$id->local_transp}}" class="form-control w-75" readonly required>
        </div>
        <div class="mb-3">
            <label class="form-label">CP</label>
            <input type="text" name="cpt_transp" value="{{$id->cpt_transp}}" class="form-control w-75" readonly required>
        </div>
        <div class="mb-3">
            <label class="form-label">Telefono*</label>
            <input type="text" name="telef_transp" value="{{$id->telef_transp}}" class="form-control w-75" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Email*</label>
            <input type="email" name="email_transp" value="{{$id->email_transp}}" class="form-control w-75" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Nº manifiesto inicial*</label>
            <input type="number" name="manifiesto_inicial" value="{{$id->manifiesto_inicial}}" class="form-control w-75" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Nº manifiesto final*</label>
            <input type="number" name="manifiesto_final" value="{{$id->manifiesto_final}}" class="form-control w-75" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Nº manifiesto actual*</label>
            <input type="number" name="manifiesto_actual" value="{{$id->manifiesto_actual}}" class="form-control w-75" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Habilitación municipal n°*</label>
            <input type="text" name="trans_num_hab_mun" value="{{$id->trans_num_hab_mun}}" class="form-control w-75" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Habilitación municipal vto*</label>
            <input type="date" name="trans_vto_hab_mun" value="{{$id->trans_vto_hab_mun}}" class="form-control w-75" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Habilitación provincial n°*</label>
            <input type="text" name="trans_nro_hab_pro" value="{{$id->trans_nro_hab_pro}}" class="form-control w-75" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Habilitación provincial vto*</label>
            <input type="date" name="trans_vto_hab_pro" value="{{$id->trans_vto_hab_pro}}" class="form-control w-75" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Habilitación nacional n°*</label>
            <input type="text" name="trans_nro_hab_nac" value="{{$id->trans_nro_hab_nac}}" class="form-control w-75" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Habilitación nacional vto*</label>
            <input type="date" name="trans_vto_hab_nac" value="{{$id->trans_vto_hab_nac}}" class="form-control w-75" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Tipo de transporte*</label>
            <select class="form-select w-75" name="tipo_transporte">
                <option value="{{$id->tipo_transporte}}">{{$id->tipo_transporte}}</option>

                @if (($id->tipo_transporte) == 'Provincial')

                <option value="Nacional">Nacional</option>
                <option value="Ambas">Ambas</option>

                @elseif (($id->tipo_transporte) == 'Nacional')

                <option value="Provincial">Provincial</option>
                <option value="Ambas">Ambas</option>

                @elseif (($id->tipo_transporte) == 'Ambas')

                <option value="Provincial">Provincial</option>
                <option value="Nacional">Nacional</option>

                @endif
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label">Alta o baja*</label>
            <select class="form-select w-75" name="transp_act">
                <option value="{{$id->transp_act}}">{{$id->transp_act}}</option>
                @if (($id->transp_act) == 'ALTA')
                <option value="BAJA">BAJA</option>
                @else
                <option value="ALTA">ALTA</option>
                @endif
            </select>
        </div>

        <input type="text" value="{{$fecha}}" name="fecha_usu_alta" style="display: none;">
        <input type="text" value="{{$fecha}}" name="fecha_usu_modif" style="display: none;">
        <input type="text" value="{{$fecha}}" name="updated_at" style="display: none;">

        <button type="submit" class="btn btn-primary">Cargar</button>
        <a href="{{url('/listatransportes')}}"><button type="button" class="btn btn-primary">Listado</button></a>
    </form>
</div>

@endsection