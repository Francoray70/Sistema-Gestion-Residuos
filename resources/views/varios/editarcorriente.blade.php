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

<div class="container w-85 border p-3 mt-5">
    <h2 class="mb-3">EDITAR CORRIENTES DE RESIDUOS</h2>
    <form action="{{ url('/corrientesderesiduos/'.$id->id)}}" method="post">
        @method('PATCH')
        @csrf
        <table class="table table-light mt-4 w-85">

            <thead>
                <tr>
                    <th>Corriente</th>
                    <th>Descripcion</th>
                    <th>Unidad de medida</th>
                    <th>Estado</th>
                    <th>Peligrosidad</th>
                </tr>
            </thead>


            <tbody>

                <tr>
                    <td><input type="text" class="form-control w-75" required value="{{$id->id_corrientes}}" name="id_corrientes"></td>
                    <td><input type="text" class="form-control w-75" required value="{{$id->desc_corrientes}}" name="desc_corrientes"></td>
                    <td>
                        <select name="um" required class="form-select w-75">
                            <option selected value="{{$id->um}}">{{$id->um}}</option>

                            @if (($id->um) == 'KGs')

                            <option value="Lts">Litros</option>

                            @else

                            <option value="KGs">Kilogramos</option>

                            @endif
                        </select>
                    <td>
                        <select name="estado_cte" required class="form-select w-75">
                            <option selected value="{{$id->estado_cte}}">{{$id->estado_cte}}</option>
                            @if (($id->estado_cte) == 'Solido')

                            <option value="Liquido">Liquido</option>
                            <option value="Semi solido">Semi solido</option>

                            @elseif (($id->estado_cte) == 'Liquido')

                            <option value="Solido">Solido</option>
                            <option value="Semi solido">Semi solido</option>

                            @elseif (($id->estado_cte) == 'Semi solido')

                            <option value="Solido">Solido</option>
                            <option value="Liquido">Liquido</option>

                            @endif
                        </select>
                    </td>
                    <td><input type="text" class="form-control w-75" required value="{{$id->peligrosidad}}" name="peligrosidad"></td>
                </tr>

            </tbody>

        </table>

        <input type="text" value="{{$fecha}}" name="updated_at" style="display: none;">

        <button type="submit" class="btn btn-primary">Actualizar</button>
        <a href="{{url('/listacorrientes')}}">
            <button type="button" class="btn btn-primary">Listado</button>
        </a>
    </form>
</div>

@endsection