<?php

use Carbon\Carbon;

$fecha = Carbon::now();
?>

@extends('nav')


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
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
                $.post("{{asset('gets/getCp.php')}}", {
                    ciudades: ciudades
                }, function(data) {
                    $("#cp").html(data);
                });
            });
        })
    });
</script>


<script language="javascript">
    $(document).ready(function() {
        $("#operador").change(function() {

            $('#cuit').find('option').remove().end().append('<option value="whatever"></option>').val('whatever');

            $("#operador option:selected").each(function() {
                empresa = $(this).val();
                $.post("{{asset('gets/getCuit.php')}}", {
                    empresa: empresa
                }, function(data) {
                    $("#cuit").html(data);
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
    <h2 class="mb-3">ALTA DE OPERADOR DE DISPOSICIÓN FINAL</h2>
    <form action="{{url('/opdispfinal')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label class="form-label">Operador de disposición final</label>
            <select class="form-select w-75" name="id_operador_df" id="operador" required>
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
            <select class="form-select w-75" name="cuit_odf" id="cuit" required>
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label">Direccion</label>
            <input type="text" name="direc_odf" class="form-control w-75" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Provincia</label>
            <select class="form-select w-75" name="prov_odf" id="provincia" required>
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
            <select class="form-select w-75" name="local_odf" id="ciudad" required>
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label">Codigo postal</label>
            <select class="form-select w-75" name="cpodf" id="cp" required>
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label">Telefono</label>
            <input type="text" name="tel_odf" class="form-control w-75" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Ubicacion tratamiento</label>
            <input type="text" name="ubi_odf" class="form-control w-75" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Email</label>
            <input type="email" name="email_odf" class="form-control w-75" required>
        </div>
        <div class="mb-3">
            <label class="form-label">CDF inicial</label>
            <input type="number" name="cdf_inicial" class="form-control w-75" required>
        </div>
        <div class="mb-3">
            <label class="form-label">CDF final</label>
            <input type="number" name="cdf_final" class="form-control w-75" required>
        </div>
        <div class="mb-3">
            <label class="form-label">CDF actual</label>
            <input type="number" name="cdf_actual" class="form-control w-75" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Habilitación municipal nº</label>
            <input type="text" name="hab_mun_nro_odf" class="form-control w-75" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Habilitación municipal vto</label>
            <input type="date" name="hab_mun_vto_odf" class="form-control w-75" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Habilitación municipal</label>
            <input class="form-control w-75" type="file" name="hab_mun_odf" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Habilitación provincial n°</label>
            <input type="text" name="hab_pro_nro_odf" class="form-control w-75" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Habilitación provincial vto</label>
            <input type="date" name="hab_pro_vto_odf" class="form-control w-75" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Habilitación provincial</label>
            <input class="form-control w-75" type="file" name="hab_pro_odf" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Habilitación nacional n°</label>
            <input type="text" name="nro_hab_nac" class="form-control w-75" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Habilitación nacional vto</label>
            <input type="date" name="vto_hab_nac" class="form-control w-75" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Habilitación nacional</label>
            <input class="form-control w-75" type="file" name="habil_nacion" required>
        </div>

        <input type="text" name="fecha_usu_alta" value="{{$fecha}}" style="display: none;">
        <input type="text" name="fecha_usu_modi" value="{{$fecha}}" style="display: none;">
        <input type="text" name="updated_at" value="{{$fecha}}" style="display: none;">
        <input type="text" name="cdf_act" value="ALTA" style="display: none;">

        <button type="submit" class="btn btn-primary">Cargar</button>
        <a href="{{url('/listaodf')}}">
            <button type="button" class="btn btn-primary">Listado</button>
        </a>
    </form>
</div>

@endsection