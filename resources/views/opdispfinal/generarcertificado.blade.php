<?php

use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

$fecha = Carbon::now();
$user = Auth::user();
$userEmpresa = $user->empresa;
$userId = $user->id;

?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script language="javascript">
    $(document).ready(function() {
        $("#operadora").change(function() {

            $('#corriente').find('option').remove().end().append('<option value="whatever"></option>').val('whatever');
            $('#certificadodf').find('option').remove().end().append('<option value="whatever"></option>').val('whatever');

            $("#operadora option:selected").each(function() {
                id_oper_df = $(this).val();

                $.post("{{asset('gets/getManidet.php')}}", {
                    gener_nom: id_oper_df
                }, function(data) {
                    $("#manifiestonac").html(data);
                });
                $.post("{{asset('gets/getCertifodf.php')}}", {
                    id_operador_df: id_oper_df
                }, function(data) {
                    $("#certificadodf").html(data);
                });
            });
        })
    });
</script>

<script language="javascript">
    $(document).ready(function() {
        $("#operadora").change(function() {

            $("#operadora option:selected").each(function() {
                id_operador_df = $(this).val();

                $.post("{{asset('gets/getNumeros.php')}}", {
                    id_operador_df: id_operador_df
                }, function(data) {
                    $("#numerito").html(data);
                });
                $.post("{{asset('gets/getNumeros2.php')}}", {
                    id_operador_df: id_operador_df
                }, function(data) {
                    $("#numerito2").html(data);
                });
                $.post("{{asset('gets/getNumeros3.php')}}", {
                    gener_nom: id_operador_df
                }, function(data) {
                    $("#numerito3").html(data);
                });
                $.post("{{asset('gets/getVencimiento.php')}}", {
                    id_operador_df: id_operador_df
                }, function(data) {
                    $("#vencimiento").html(data);
                });
                $.post("{{asset('gets/getVencimiento2.php')}}", {
                    id_operador_df: id_operador_df
                }, function(data) {
                    $("#vencimiento2").html(data);
                });
                $.post("{{asset('gets/getVencimiento3.php')}}", {
                    gener_nom: id_operador_df
                }, function(data) {
                    $("#vencimiento3").html(data);
                });

                $.post("{{asset('gets/getUbi.php')}}", {
                    id_operador_df: id_operador_df
                }, function(data) {
                    $("#ubicacion").html(data);
                });
            })
        });
    });
</script>

<script language="javascript">
    $(document).ready(function() {
        $("#manifiestonac").change(function() {


            $("#manifiestonac option:selected").each(function() {
                id_manifiesto = $(this).val();
                $.post("{{asset('gets/getGenerador.php')}}", {
                    id_manifiesto: id_manifiesto
                }, function(data) {
                    $("#generador").html(data);
                });
                $.post("{{asset('gets/getTranspor.php')}}", {
                    id_manifiesto: id_manifiesto
                }, function(data) {
                    $("#transpor").html(data);
                });
            });
        })
    });
</script>

@extends('nav')


<style>
    .container {
        background-color: rgb(228, 228, 228);
        font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
    }
</style>

<!-------------------------


----------------------------------------------FIN DE ESTILOS ARRANQUE DE PROGRAMA------------


-------------------------------->

@section('navbar')

<div class="container w-85 border p-4 mt-5">
    <h2 class="mb-3">GENERAR CERTIFICADO DE DISPOSICION FINAL</h2>
    <form action="" method="post">
        @csrf
        <input type="text" value="{{$userId}}" name="idusuario" style="display: none;">
        <div class="mb-3">
            <label class="form-label">Provincia o nacion</label>
            <select class="form-select w-75" name="generador" id="" required>
                <option selected>Seleccione su opcion</option>
                <option value="Provincia">Provincia</option>
                <option value="Nacion">Nacion</option>
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label">Operador de disposición final</label>
            <input class="form-control w-75" type="text" name="" readonly value="{{$operador}}">
        </div>
        <div class="mb-3">
            <label class="form-label">N° de certificado de disposicion final</label>
            <input class="form-control w-75" type="text" name="" readonly value="{{$certificado}}">
        </div>
        <div class="mb-3">
            <label class="form-label">Manifiesto transporte</label>
            <input class="form-control w-75" type="text" name="" readonly value="{{$manifiesto}}">
        </div>
        <div class="mb-3">
            <label class="form-label">Fecha del certificado</label>
            <input class="form-control w-75" type="date" name="">
        </div>
        <div class="mb-3">
            <label class="form-label">Generador</label>
            <input class="form-control w-75" type="text" name="" readonly value="{{$generador}}">
        </div>
        <div class="mb-4">
            <label class="form-label">Fecha del tratamiento</label>
            <input class="form-control w-75" type="date" required name="">
        </div>



        @if ($consultaManifiestoDet)
        @foreach ($consultaManifiestoDet as $datosDetalle)
        <div class="row mb-5">
            <div class="col">
                <label class="form-label">Corriente</label>
                <input type="text" name="" readonly value="{{$datosDetalle->id_corrientes}}">
            </div>
            <div class="col">
                <label class="form-label">Descripcion</label>
                <input type="text" name="" readonly value="{{$datosDetalle->descripcion}}">
            </div>
            <div class="col">
                <label class="form-label">Contenedor</label>
                <input type="text" name="" readonly value="{{$datosDetalle->um}}">
            </div>
            <div class="col">
                <label class="form-label">Cantidad real</label>
                <input type="text" name="" readonly value="{{$datosDetalle->cantidad}}">
            </div>
            <div class="col">
                <label class="form-label">Tratamiento</label>
                <input type="text" class="form-control w-75 mb-2" name="descr_ingreso" required>
            </div>
        </div>
        @endforeach
        @endif


        @if ($consultaOperador)
        @foreach ($consultaOperador as $datosOperador)
        <div class="row mb-5">
            <input type="text" name="" readonly value="{{$datosOperador->nro_hab_nac}}">
            <input type="text" name="" readonly value="{{$datosOperador->vto_hab_nac}}">
            <input type="text" name="" readonly value="{{$datosOperador->hab_pro_nro_odf}}">
            <input type="text" name="" readonly value="{{$datosOperador->hab_pro_vto_odf}}">
            <input type="text" name="" readonly value="{{$datosOperador->ubi_odf}}">
        </div>
        @endforeach
        @endif

        @if ($consultaManifiesto)
        @foreach ($consultaManifiesto as $datosManifiesto)
        <div class="row mb-5">
            <input type="text" value="{{$datosManifiesto->id_transp}}" name="fecha">
        </div>
        @endforeach
        @endif

        @if ($consultaGenerador)
        @foreach ($consultaGenerador as $datosGene)
        <div class="row mb-5">
            <input type="text" value="{{$datosGene->gener_nro_hab_nac}}" name="fecha">
            <input type="date" value="{{$datosGene->gener_vto_hab_nac}}" name="fecha">
        </div>
        @endforeach
        @endif
        <button type="submit" class="btn btn-primary">Cargar</button>
    </form>
</div>

@endsection