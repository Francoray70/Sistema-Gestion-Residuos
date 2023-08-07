<?php

use Carbon\Carbon;

$fecha = Carbon::now();

use App\Models\roles;

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
    <h2 class="mb-3">EDITAR USUARIO</h2>
    <form action="{{url('/usuarios/'.$id->id)}}" method="POST">

        <?php
        $rol = roles::where('id_rol', '=', $id->rol_id)->get();

        ?>
        @foreach ($rol as $nombreRol)


        @method('PATCH')
        @csrf
        <div class="mb-3">
            <label class="form-label">Nombre</label>
            <input type="text" name="nombre" value="{{$id->nombre}}" class="form-control w-75" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Apellido</label>
            <input type="text" name="apellido" value="{{$id->apellido}}" class="form-control w-75" required>
        </div>
        <div class="mb-3">
            <label class="form-label">DNI</label>
            <input type="text" name="dni" value="{{$id->dni}}" class="form-control w-75" required>
        </div>
        <div class="mb-3">
            <label class="form-label">CUIT</label>
            <input type="text" name="usuario" value="{{$id->usuario}}" class="form-control w-75" readonly required>
        </div>
        <div class="mb-3">
            <label class="form-label">Empresa</label>
            <input type="text" name="empresa" value="{{$id->empresa}}" class="form-control w-75" readonly required>
        </div>
        <div class="mb-3">
            <label class="form-label">Email</label>
            <input type="text" name="email" value="{{$id->email}}" class="form-control w-75" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Cargo</label>
            <input type="text" name="cargo" value="{{$id->cargo}}" class="form-control w-75" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Provincia</label>
            <input type="text" name="provincia" value="{{$id->provincia}}" class="form-control w-75" readonly required>
        </div>
        <div class="mb-3">
            <label class="form-label">Rol</label>
            <input type="text" value="{{$nombreRol->rol}}" class="form-control w-75" readonly required>
            <input type="text" name="rol_id" value="{{$id->rol_id}}" class="form-control w-75" readonly required style="display: none;">
        </div>
        <div class="mb-3">
            <label class="form-label">Banear usuario</label>
            <select name="baneado" required class="form-select w-75">
                <option selected value="{{$id->baneado}}">{{$id->baneado}}</option>
                @if (($id->baneado) == 'SI')
                <option value="NO">NO</option>
                @else
                <option value="SI">SI</option>
                @endif
            </select>
        </div>

        <input type="text" value="1" name="password" style="display: none;">
        <input type="text" value="{{$id->fecha_usu_alta}}" name="fecha_usu_alta" style="display: none;">
        <input type="text" value="{{$fecha}}" name="fecha_usu_modi" style="display: none;">
        <input type="text" value="{{$fecha}}" name="updated_at" style="display: none;">

        <button type="submit" class="btn btn-primary">Actualizar</button>
        <a href="{{url('/listausuarios')}}"><button type="button" class="btn btn-primary">Listado</button></a>
    </form>

    @endforeach
</div>

@endsection