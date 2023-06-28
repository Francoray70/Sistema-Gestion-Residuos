<?php

use App\Http\Controllers\ControllerBusiness;
use App\Http\Controllers\EmpresasController;
use App\Models\Empresas;


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
    <form action="{{url('/transportistas')}}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Transporte</label>
            <select class="form-select w-75" name="id_transp" id="id_transp" aria-label="Default select example">
                <option selected>Seleccione su empresa</option>

                @if (!empty($registros))

                @foreach ($registros as $datosTransporte)

                <option name="id_transp" value="{{$datosTransporte->nombre}}">{{$datosTransporte->nombre}}</option>

                @endforeach

                @endif

            </select>
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Direccion</label>
            <input type="text" name="direc_transp" class="form-control w-75" id="exampleInputPassword1">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">CUIT</label>
            <select class="form-select w-75" name="cuit" id="cuit" aria-label="Default select example">
            </select>
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Provincia</label>
            <select class="form-select w-75" name="prov_transp" aria-label="Default select example">
                <option selected>Seleccione su provincia</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Ciudad</label>
            <select class="form-select w-75" name="local_transp" aria-label="Default select example">
                <option selected>Seleccione una opción</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">CP</label>
            <select class="form-select w-75" name="cpt_transp" aria-label="Default select example">
                <option selected>Seleccione una opción</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Telefono</label>
            <input type="text" name="telef_transp" class="form-control w-75" id="exampleInputPassword1">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Email</label>
            <input type="email" name="email_transp" class="form-control w-75" id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Nº manifiesto inicial</label>
            <input type="number" name="manifiesto_inicial" class="form-control w-75" id="exampleInputPassword1">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Nº manifiesto final</label>
            <input type="number" name="manifiesto_final" class="form-control w-75" id="exampleInputPassword1">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Nº manifiesto actual</label>
            <input type="number" name="manifiesto_actual" class="form-control w-75" id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Habilitación municipal n°</label>
            <input type="text" name="trans_nro_hab_mun" class="form-control w-75" id="exampleInputPassword1">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Habilitación municipal vto</label>
            <input type="date" name="trans_vto_hab_mun" class="form-control w-75" id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label for="formFile" class="form-label">Habilitación municipal</label>
            <input class="form-control w-75" type="file" name="hab_mun_transp" id="formFile">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Habilitación provincial n°</label>
            <input type="text" name="trans_nro_hab_pro" class="form-control w-75" id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Habilitación provincial vto</label>
            <input type="date" name="trans_vto_hab_pro" class="form-control w-75" id="exampleInputPassword1">
        </div>
        <div class="mb-3">
            <label for="formFile" class="form-label">Habilitación provincial</label>
            <input class="form-control w-75" type="file" name="hab_pcia_transp" id="formFile">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Habilitación nacional n°</label>
            <input type="text" name="trans_nro_hab_nac" class="form-control w-75" id="exampleInputPassword1">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Habilitación nacional vto</label>
            <input type="date" name="trans_vto_hab_nac" class="form-control w-75" id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label for="formFile" class="form-label">Habilitación nacional</label>
            <input class="form-control w-75" type="file" name="hab_nac_transp" id="formFile">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Tipo de transporte</label>
            <select class="form-select w-75" name="tipo_transporte" aria-label="Default select example">
                <option selected>Seleccione el tipo</option>
                <option value="1">Provincial</option>
                <option value="2">Nacional</option>
                <option value="3">Ambas</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Cargar</button>
        <a href="{{url('/listatransportes')}}"><button type="button" class="btn btn-primary">Listado</button></a>
    </form>
</div>

@endsection