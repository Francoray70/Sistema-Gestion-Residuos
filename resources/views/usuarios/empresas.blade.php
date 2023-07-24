<?php

use Carbon\Carbon;

$fecha = Carbon::now();

use Illuminate\Support\Facades\Auth;

$user = Auth::user();
$userId = $user->id;

?>


@extends('nav')

<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<style>
    .container {
        background-color: rgb(228, 228, 228);
        font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
    }
</style>

@section('navbar')

<div class="container w-85 border p-4 mt-5">
    <h2 class="mb-3">ALTA DE EMPRESA</h2>
    <form action="{{ url('/empresas') }}" id="miFormulario" method="post">
        @csrf

        <div class="mb-3">
            <label class="form-label">Nombre de la empresa</label>
            <input type="text" name="nombre" required class="form-control w-75">
        </div>
        <div class="mb-3">
            <label class="form-label">CUIT</label>
            <input type="text" name="cuit" data-mask="00-00000000-0" required class="form-control w-75" id="cuit">
        </div>
        <div class="mb-3">
            <label class="form-label">Categoria</label>
            <select name="rol_id" required class="form-select w-75">
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
            <label class="form-label">Provincia</label>
            <select name="provincia" required class="form-select w-75">
                <option selected>Seleccione su provincia</option>
                @if (!empty($provincias))

                @foreach ($provincias as $datosProvincias)
                <option name="provincia" value="{{ $datosProvincias->provincia }}">{{ $datosProvincias->provincia }}</option>
                @endforeach

                @endif

            </select>
        </div>

        <input type="text" style="display: none" name="fecha_alta" value="{{$fecha}}">
        <input type="text" style="display: none" name="fecha_modificacion" value="{{$fecha}}">
        <input type="text" style="display: none" name="baneado" value="NO">
        <input type="text" style="display: none" name="pago" value="NO">
        <input type="text" style="display: none" name="altauser" value="{{$userId}}">
        <input type="text" style="display: none" name="modifuser" value="{{$userId}}">
        <input type="text" style="display: none" name="updated_at" value="{{$fecha}}">

        <button type="submit" value="enviar" id="submit" class="btn btn-primary">Cargar</button>
    </form>
</div>


<script type="text/javascript" src="{{asset('jquery.mask.js')}}"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
@endsection