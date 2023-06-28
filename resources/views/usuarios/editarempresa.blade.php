<?php

$fecha_actual = date("Y-m-d");

use app\Http\Controllers\EmpresasController;

?>

@extends('nav')
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<style>
    .container {
        background-color: rgb(228, 228, 228);
    }
</style>

@section('navbar')


<h2 class="mt-3">EDITAR EMPRESA</h2>

<form action="{{ url('/empresas/'.$id->id)}}" method="POST">
    @method('PATCH')
    @csrf

    <table class="table table-light mt-4 w-85">

        <thead>
            <tr>
                <th>EMPRESA</th>
                <th>CUIT</th>
                <th>ROL</th>
                <th>PROVINCIA</th>
                <th>BANEADO</th>
            </tr>
        </thead>


        <tbody>

            <tr>
                <td><input type="text" class="form-control w-75" required value="{{$id->nombre}}" name="nombre"></td>
                <td><input type="text" class="form-control w-75" data-mask="00-00000000-0" required value="{{$id->cuit}}" name="cuit"></td>
                <td><input type="text" class="form-control w-75" required value="{{$id->rol_id}}" readonly name="rol_id"></td>
                <td><input type="text" class="form-control w-75" required value="{{$id->provincia}}" readonly name="provincia"></td>
                <td>
                    <select name="baneado" class="form-select w-75">
                        <option selected value="{{$id->baneado}}">{{$id->baneado}}</option>
                        @if (($id->baneado) == 'SI')
                        <option value="NO">NO</option>
                        @else
                        <option value="SI">SI</option>
                        @endif
                    </select>
                </td>
            </tr>

            <input type="date" style="display: none" name="fecha_alta" value="{{$fecha_actual}}">
            <input type="date" style="display: none" name="fecha_modificacion" value="{{$fecha_actual}}">
            <input type="text" style="display: none" name="pago" value="NO">
            <input type="text" style="display: none" name="altauser" value="NOMBRE DE USUARIO">
            <input type="text" style="display: none" name="modifuser" value="NOMBRE DE USUARIO">

        </tbody>

    </table>

    <button type="submit" class="btn btn-primary ml-3">Actualizar</button>
    <a href="{{url('/listaempresas')}}"><button type="button" class="btn btn-primary ml-3">Listado</button></a>
</form>

<script type="text/javascript" src="{{asset('jquery.mask.js')}}"></script>
<script type="text/javascript" src="{{asset('validarcuit.js')}}"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

@endsection