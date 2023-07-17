<?php

use Carbon\Carbon;

$fecha = Carbon::now();
?>

@extends('nav')

<style>
    .container {
        background-color: rgb(228, 228, 228);
        font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
    }
</style>

@section('navbar')

<div class="container w-85 border p-3 mt-5">
    <h2 class="mb-3">EDITAR LOCALIDAD</h2>
    <form action="{{ url('/localidades/'.$id->id)}}" method="post">
        @method('PATCH')
        @csrf
        <table class="table table-light mt-4 w-85">

            <thead>
                <tr>
                    <th>Provincia</th>
                    <th>Ciudad</th>
                    <th>Codigo postal</th>
                </tr>
            </thead>


            <tbody>

                <tr>
                    <td>
                        <select name="provincia" required class="form-select w-75">
                            <option selected value="{{$id->provincia}}">{{$id->provincia}}</option>
                            @if (!empty($provincias))
                            @foreach ($provincias as $datosProvincias)
                            <option value="{{$datosProvincias->provincia}}">{{$datosProvincias->provincia}}</option>
                            @endforeach
                            @endif
                        </select>
                    </td>
                    <td><input type="text" class="form-control w-75" required value="{{$id->ciudades}}" name="ciudades"></td>
                    <td><input type="text" class="form-control w-75" required value="{{$id->cp}}" name="cp"></td>
                </tr>

            </tbody>

        </table>

        <input type="text" value="{{$fecha}}" name="updated_at" style="display: none;">

        <button type="submit" class="btn btn-primary">Actualizar</button>
        <a href="{{url('/listalocalidades')}}">
            <button type="button" class="btn btn-primary">Listado</button>
        </a>
    </form>
</div>

@endsection