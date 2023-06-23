<?php

$fecha_actual = date("Y-m-d");

use App\Http\Controllers\ProvinciasController;

?>


@extends('nav')

<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<style>
    .container {
        background-color: rgb(228, 228, 228);
    }
</style>

@section('navbar')

<div class="container w-85 border p-4 mt-5">
    <h2 class="mb-3">ALTA DE EMPRESA</h2>
    <form action="{{ url('/empresas') }}" method="post">
        @csrf

        <div class="mb-3">
            <label for="nombreEmpresa" class="form-label">Nombre de la empresa</label>
            <input type="text" name="nombre" required class="form-control w-75" id="nombreEmpresa">
        </div>
        <div class="mb-3">
            <label for="cuitEmpresa" class="form-label">CUIT</label>
            <input type="text" name="cuit" data-mask="00-00000000-0" required class="form-control w-75" id="cuitEmpresa" placeholder="Nª de CUIT">
        </div>
        <div class="mb-3">
            <label for="categoriaEmpresa" class="form-label">Categoria</label>
            <select name="rol_id" required class="form-select w-75" aria-label="categoriaEmpresa">
                <option selected>Seleccione</option>
                <option value="1">Generador</option>
                <option value="2">Transportista</option>
                <option value="3">Operador por almacenamiento</option>
                <option value="4">Operador por disposicion final</option>
                <option value="5">Ente fiscal</option>
                <option value="6">Administrador</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="provinciaEmpresa" class="form-label">Provincia</label>
            <select name="provincia" required class="form-select w-75" aria-label="provinciaEmpresa">
                <option selected>Seleccione su provincia</option>

                @foreach ($provincias as $datosProvincias)
                <option value="{{ $datosProvincias->provincia }}">{{ $datosProvincias->provincia }}</option>
                @endforeach

            </select>
        </div>

        <input type="date" style="display: none" name="fecha_alta" value="{{$fecha_actual}}">
        <input type="date" style="display: none" name="fecha_modificacion" value="{{$fecha_actual}}">
        <input type="text" style="display: none" name="baneado" value="NO">
        <input type="text" style="display: none" name="pago" value="NO">
        <input type="text" style="display: none" name="altauser" value="NOMBRE DE USUARIO">
        <input type="text" style="display: none" name="modifuser" value="NOMBRE DE USUARIO">

        <button type="submit" value="enviar" class="btn btn-primary">Cargar</button>
    </form>
</div>

<script type="text/javascript" src="{{asset('jquery.mask.js')}}"></script>
<script type="text/javascript" src="{{asset('validarcuit.js')}}"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
@endsection