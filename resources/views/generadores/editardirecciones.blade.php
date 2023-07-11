<?php

use Carbon\Carbon;

$fecha = Carbon::now();

?>

@extends('nav')

<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script language="javascript">
    $(document).ready(function() {
        $("#provincia").change(function() {

            $("#provincia option:selected").each(function() {
                provincia = $(this).val();
                $.post("{{asset('gets/getCiudad.php')}}", {
                    provincia: provincia
                }, function(data) {
                    $("#ciudades").html(data);
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
    <h2 class="mb-3">EDITAR DIRECCIONES</h2>
    <form action="{{ url('/direccionesgenerador/'.$id->id)}}" method="post">
        @method('PATCH')
        @csrf
        <table class="table table-light mt-4 w-85">

            <thead>
                <tr>
                    <th>Generador</th>
                    <th>Provincia</th>
                    <th>Ciudad</th>
                    <th>Direccion de retiro</th>
                </tr>
            </thead>


            <tbody>

                <tr>
                    <td><input type="text" class="form-control w-75" required value="{{$id->nom_comp}}" name="nom_comp" readonly></td>
                    <td>
                        <select name="provincia" id="provincia" required class="form-select w-75">
                            <option selected value="{{$id->provincia}}">{{$id->provincia}}</option>
                            @if (!empty($provincias))
                            @foreach ($provincias as $datosProvincia)
                            <option value="{{$datosProvincia->provincia}}">{{$datosProvincia->provincia}}</option>
                            @endforeach
                            @endif
                        </select>
                    <td>
                        <select name="ciudad" id="ciudades" required class="form-select w-75">
                        </select>
                    </td>
                    <td><input type="text" class="form-control w-75" required value="{{$id->dir_de_retiro}}" name="dir_de_retiro"></td>

                </tr>

            </tbody>

        </table>

        <input type="text" value="{{$fecha}}" name="updated_at" style="display: none;">

        <button type="submit" class="btn btn-primary">Actualizar</button>
        <a href="{{url('/listadirecciones')}}">
            <button type="button" class="btn btn-primary">Listado</button>
        </a>
    </form>
</div>

@endsection