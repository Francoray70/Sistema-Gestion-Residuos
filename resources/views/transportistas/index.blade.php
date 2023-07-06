<?php

use Carbon\Carbon;

$fecha = Carbon::now();

?>

@extends('nav')


<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
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
        $("#transporte").change(function() {

            $('#cuit').find('option').remove().end().append('<option value="whatever"></option>').val('whatever');

            $("#transporte option:selected").each(function() {
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
    }
</style>

@section('navbar')

<div class="container w-85 border p-4 mt-5">
    <h2 class="mb-3">ALTA DE TRANSPORTES</h2>
    <form action="{{url('/transportistas')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label class="form-label">Transporte</label>
            <select class="form-select w-75" name="id_transp" id="transporte" required>
                <option selected>Seleccione su empresa</option>

                @if (!empty($empresas))

                @foreach ($empresas as $datosTransporte)

                <option name="id_transp" value="{{$datosTransporte->nombre}}">{{$datosTransporte->nombre}}</option>

                @endforeach

                @endif

            </select>
        </div>
        <div class="mb-3">
            <label class="form-label">CUIT</label>
            <select class="form-select w-75" name="cuit_trans" id="cuit" required>
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label">Direccion</label>
            <input type="text" name="direc_transp" class="form-control w-75" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Provincia</label>
            <select class="form-select w-75" name="prov_transp" id="provincia" required>
                <option selected>Seleccione su provincia</option>
                @if (!empty($provincias))

                @foreach ($provincias as $datosProvincia)

                <option value="{{$datosProvincia->provincia}}">{{$datosProvincia->provincia}}</option>

                @endforeach

                @endif
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label">Ciudad</label>
            <select class="form-select w-75" name="local_transp" id="ciudad" required>
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label">CP</label>
            <select class="form-select w-75" name="cpt_transp" id="cp" required>
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label">Telefono</label>
            <input type="text" name="telef_transp" class="form-control w-75" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Email</label>
            <input type="email" name="email_transp" class="form-control w-75" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Nº manifiesto inicial</label>
            <input type="number" name="manifiesto_inicial" class="form-control w-75" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Nº manifiesto final</label>
            <input type="number" name="manifiesto_final" class="form-control w-75" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Nº manifiesto actual</label>
            <input type="number" name="manifiesto_actual" class="form-control w-75" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Habilitación municipal n°</label>
            <input type="text" name="trans_num_hab_mun" class="form-control w-75" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Habilitación municipal vto</label>
            <input type="date" name="trans_vto_hab_mun" class="form-control w-75" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Habilitación municipal</label>
            <input class="form-control w-75" type="file" name="hab_mun_transp" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Habilitación provincial n°</label>
            <input type="text" name="trans_nro_hab_pro" class="form-control w-75" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Habilitación provincial vto</label>
            <input type="date" name="trans_vto_hab_pro" class="form-control w-75" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Habilitación provincial</label>
            <input class="form-control w-75" type="file" name="hab_pcia_transp" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Habilitación nacional n°</label>
            <input type="text" name="trans_nro_hab_nac" class="form-control w-75" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Habilitación nacional vto</label>
            <input type="date" name="trans_vto_hab_nac" class="form-control w-75" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Habilitación nacional</label>
            <input class="form-control w-75" type="file" name="hab_nac_transp" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Tipo de transporte</label>
            <select class="form-select w-75" name="tipo_transporte" required>
                <option selected>Seleccione el tipo</option>
                <option value="Provincial">Provincial</option>
                <option value="Nacional">Nacional</option>
                <option value="Ambas">Ambas</option>
            </select>
        </div>

        <input type="text" value="{{$fecha}}" name="fecha_usu_alta" style="display: none;">
        <input type="text" value="{{$fecha}}" name="fecha_usu_modif" style="display: none;">
        <input type="text" value="{{$fecha}}" name="updated_at" style="display: none;">
        <input type="text" value="ALTA" name="transp_act" style="display: none;">

        <button type="submit" class="btn btn-primary">Cargar</button>
        <a href="{{url('/listatransportes')}}"><button type="button" class="btn btn-primary">Listado</button></a>
    </form>
</div>

@endsection