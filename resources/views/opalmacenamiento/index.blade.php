<?php

use Carbon\Carbon;

$fecha = Carbon::now();

?>

@extends('nav')

<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        $("#generador").on("change", function() {
            $('#cuit').find('option').remove().end().append('<option value="whatever"></option>').val('whatever');

            $("#generador option:selected").each(function() {
                var empresa = $(this).val();
                $.post("{{asset('gets/getCuit.php')}}", {
                    empresa: empresa
                }, function(data) {
                    $("#cuit").html(data);
                });
            });
        });
    });
</script>

<script language="javascript">
    $(document).ready(function() {
        $("#provincia").change(function() {

            $('#cp').find('option').remove().end().append('<option value="whatever"></option>').val('whatever');

            $("#provincia option:selected").each(function() {
                provincia = $(this).val();
                $.post("{{asset('gets/getCiudad.php')}}", {
                    provincia: provincia
                }, function(data) {
                    $("#ciudad").html(data);
                });
            });
        })
    });

    $(document).ready(function() {
        $("#ciudad").change(function() {

            $("#ciudad option:selected").each(function() {
                ciudades = $(this).val();
                $.post("{{asset('gets/getCP.php')}}", {
                    ciudades: ciudades
                }, function(data) {
                    $("#cp").html(data);
                });
            });
        })
    });
</script>

<style>
    .container {
        background-color: rgb(228, 228, 228);
        font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
    }
</style>

@section('navbar')

<div class="container w-85 border p-4 mt-5">
    <h2 class="mb-3">ALTA DE OPERADOR DE ALMACENAMIENTO</h2>
    <form action="{{url('/opalmacenamiento')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label class="form-label">Razon social</label>
            <select class="form-select w-75" name="gener_nom" id="generador" required>
                <option selected>Seleccione su empresa</option>
                @if (!empty($empresas))

                @foreach ($empresas as $datosEmpresas)
                <option value="{{ $datosEmpresas->nombre }}">{{ $datosEmpresas->nombre }}</option>
                @endforeach

                @endif
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label">CUIT</label>
            <select class="form-select w-75" name="gener_cuit" id="cuit" required>
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label">Direccion</label>
            <input type="text" name="gener_dir" class="form-control w-75" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Provincia</label>
            <select class="form-select w-75" name="gener_prov" id="provincia" required>
                <option selected>Seleccione su provincia</option>
                @if (!empty($provincias))

                @foreach ($provincias as $datosProvincia)
                <option value="{{ $datosProvincia->provincia }}">{{ $datosProvincia->provincia }}</option>
                @endforeach

                @endif
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label">Ciudad</label>
            <select class="form-select w-75" name="gener_ciu" id="ciudad" required>
                <option selected>Seleccione una opción</option>
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label">CP</label>
            <select class="form-select w-75" name="gener_cp" id="cp" required>
                <option selected>Seleccione una opción</option>
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label">Telefono</label>
            <input type="text" name="gener_tel" data-mask="(000)000-000000" class="form-control w-75" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Ubicacion planta</label>
            <input type="text" name="gener_ubi" class="form-control w-75" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Email</label>
            <input type="email" name="gener_mail" class="form-control w-75" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" required>
        </div>
        <div class="mb-3">
            <label class="form-label">RPG inicial</label>
            <input type="number" name="rpg_inicial" class="form-control w-75" required>
        </div>
        <div class="mb-3">
            <label class="form-label">RPG final</label>
            <input type="number" name="rpg_final" class="form-control w-75" required>
        </div>
        <div class="mb-3">
            <label class="form-label">RPG actual</label>
            <input type="number" name="rpg_actual" class="form-control w-75" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Habilitación municipal nº</label>
            <input type="text" name="gener_nro_hab_mun" class="form-control w-75" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Habilitación municipal vto</label>
            <input type="date" name="gener_vto_hab_mun" class="form-control w-75" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Habilitación municipal</label>
            <input class="form-control w-75" type="file" name="gener_hab_mun" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Habilitación provincial n°</label>
            <input type="text" name="gener_nro_hab_pro" class="form-control w-75" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Habilitación provincial vto</label>
            <input type="date" name="gener_vto_hab_pro" class="form-control w-75" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Habilitación provincial</label>
            <input class="form-control w-75" type="file" name="gener_hab_pro" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Habilitación nacional n°</label>
            <input type="text" name="gener_nro_hab_nac" class="form-control w-75" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Habilitación nacional vto</label>
            <input type="date" name="gener_vto_hab_nac" class="form-control w-75" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Habilitación nacional</label>
            <input class="form-control w-75" type="file" name="gener_hab_nac" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Operador por disposicion final</label>
            <select name="dispfinal" class="form-select w-75" required>
                <option selected>Seleccione</option>
                <option value="SI">SI</option>
                <option value="NO">NO</option>
            </select>
        </div>

        <input type="text" value="{{$fecha}}" name="fecha_usu_alta" style="display: none;">
        <input type="text" value="{{$fecha}}" name="fecha_usu_mod" style="display: none;">
        <input type="text" value="{{$fecha}}" name="updated_at" style="display: none;">
        <input type="text" value="ALTA" name="gener_act" style="display: none;">

        <button type="submit" class="btn btn-primary">Cargar</button>
        <a href="{{url('/listaopalm')}}">
            <button type="button" class="btn btn-primary">Listado</button>
        </a>
    </form>
</div>

@endsection