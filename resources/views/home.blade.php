<?php

use Illuminate\Support\Facades\Auth;

$user = Auth::user();
$userNombre = $user->nombre;
$userApellido = $user->apellido;
$userEmpresa = $user->empresa;
$userRol = $user->rol_id;

?>

@extends('nav')


<style>
    .container {
        background-color: rgb(228, 228, 228);
        font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
    }
</style>

@section('navbar')

@if ($userRol == 6)

<div class="container w-85 border p-4 mt-5">


    <form action="{{url('/inicio')}}" method="post">
        @method('PATCH')
        @csrf
        <div class="mb-3">
            <label class="form-label">Autorizacion a empresas</label>
            <select class="form-select w-75" name="empresa">
                <option selected>Seleccione la empresa</option>
                @if ($empresa)
                @foreach ($empresa as $datosEmpresa)
                <option value="{{$datosEmpresa->id}}">{{$datosEmpresa->nombre}}</option>
                @endforeach
                @endif
            </select>
        </div>
        <div class="mb-3">
            <select class="form-select w-75" name="pago">
                <option selected>Seleccione</option>
                <option value="SI">Si</option>
                <option value="NO">No</option>
                <!-- </select> -->
        </div>
        <input type="submit" class="btn btn-primary mt-3" value="Actualizar">
    </form>

    @else


    @if (!empty($manifiestosRestantes))

    <div class="container w-85 border p-4 mt-5">
        <h1>¡HOLA {{$userEmpresa}}!</h1>
        <div class="position-relative m-4">
            <div class="progress bg-white">
                <div class="progress-bar bg-success" role="progressbar" style="width: {{$manifiestosRestantes}}%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">{{$manifiestosRestantes}}%</div>
            </div>

            @if(!empty($manifiestoRestanteNumero))

            <p class="mt-5">Te restan {{$manifiestoRestanteNumero}} Manifiestos disponibles</p>
        </div>
        @endif
    </div>


    @endif

</div>
@endif


@endsection