<?php

use Carbon\Carbon;

$fecha = Carbon::now();
?>

@extends('nav')

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $("#corriente").change(function() {

            $("#corriente option:selected").each(function() {
                id_corrientes = $(this).val();
                $.post("{{asset('gets/getDescripcion.php')}}", {
                    id_corrientes: id_corrientes
                }, function(data) {
                    $("#descripcion").html(data);
                });

                $.post("{{asset('gets/getUm2.php')}}", {
                    id_corrientes: id_corrientes
                }, function(data) {
                    $("#um").html(data);
                });

                $.post("{{asset('gets/getEstados.php')}}", {
                    id_corrientes: id_corrientes
                }, function(data) {
                    $("#estado").html(data);
                });

                $.post("{{asset('gets/getPeligrosidad.php')}}", {
                    id_corrientes: id_corrientes
                }, function(data) {
                    $("#peligrosidad").html(data);
                });

            });
        })
    });
</script>

<style>
    .container {
        background-color: rgb(228, 228, 228);
    }
</style>

@section('navbar')

<div class="container w-85 border p-3 mt-5">
    <h2 class="mb-3">EDITAR CORRIENTE DE OPERADORA</h2>
    <form action="{{ url('/corrientesopdispfinal/'.$id->id)}}" method="post">
        @method('PATCH')
        @csrf
        <table class="table table-light mt-4 w-85">

            <thead>
                <tr>
                    <th>Operadora</th>
                    <th>Corriente</th>
                    <th>Descripcion</th>
                    <th>Unidad de medida</th>
                    <th>Estado</th>
                    <th>Peligrosidad</th>
                    <th>Cantidad estimada anual</th>
                </tr>
            </thead>


            <tbody>

                <tr>
                    <td><input type="text" class="form-control w-75" required value="{{$id->id_oper_df}}" name="id_oper_df" readonly></td>
                    <td>
                        <select name="id_corrientes" id="corriente" required class="form-select w-75">
                            <option selected value="{{$id->id_corrientes}}">{{$id->id_corrientes}}</option>
                            @if (!empty($corrientes))
                            @foreach ($corrientes as $datosCorrientes)
                            <option value="{{$datosCorrientes->id_corrientes}}">{{$datosCorrientes->id_corrientes}}</option>
                            @endforeach
                            @endif
                        </select>
                    <td>
                        <select name="descripcion" id="descripcion" required class="form-select w-75">
                        </select>
                    </td>
                    <td>
                        <select name="um" id="um" required class="form-select w-75">
                        </select>
                    </td>
                    <td>
                        <select name="estado" id="estado" required class="form-select w-75">
                        </select>
                    </td>
                    <td>
                        <select name="peligrosidad" id="peligrosidad" required class="form-select w-75">
                        </select>
                    </td>
                    <td><input type="text" class="form-control w-75" required value="{{$id->cantidad}}" name="cantidad"></td>
                </tr>

            </tbody>

        </table>

        <input type="text" value="{{$fecha}}" name="updated_at" style="display: none;">

        <button type="submit" class="btn btn-primary">Actualizar</button>
        <a href="{{url('/listacorrientesodf')}}">
            <button type="button" class="btn btn-primary">Listado</button>
        </a>
    </form>
</div>

@endsection