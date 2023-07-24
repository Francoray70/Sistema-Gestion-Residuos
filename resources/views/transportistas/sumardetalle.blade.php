<?php

use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use App\Models\Transportista;

$fecha = Carbon::now();
$user = Auth::user();
$userEmpresa = $user->empresa;
$userId = $user->id;

?>


@extends('nav')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>


<script language="javascript">
    $(document).ready(function() {
        $("#transporte").change(function() {

            $('#manifiesto').find('option').remove().end().append('<option value="whatever"></option>').val('whatever');

            $("#transporte option:selected").each(function() {
                id_transp = $(this).val();
                $.post("{{asset('gets/getCorriente.php')}}", {
                    id_transp: id_transp
                }, function(data) {
                    $("#corriente").html(data);
                });
            });
        })
    });
</script>
<script language="javascript">
    $(document).ready(function() {
        $("#corriente").change(function() {

            $('#kgslts').find('option').remove().end().append('<option value="whatever"></option>').val('whatever');

            $("#corriente option:selected").each(function() {
                id_corrientes = $(this).val();
                $.post("{{asset('gets/getKilos.php')}}", {
                    id_corrientes: id_corrientes
                }, function(data) {
                    $("#kgslts").html(data);
                });
                $.post("{{asset('gets/getEstados.php')}}", {
                    id_corrientes: id_corrientes
                }, function(data) {
                    $("#estado").html(data);
                });
                $.post("{{asset('gets/getDescripcion2.php')}}", {
                    id_corrientes: id_corrientes
                }, function(data) {
                    $("#descrr").html(data);
                });
            });
        })

        $("#corriente1").change(function() {

            $('#kgslts1').find('option').remove().end().append('<option value="whatever"></option>').val('whatever');

            $("#corriente1 option:selected").each(function() {
                id_corrientes = $(this).val();
                $.post("{{asset('gets/getKilos.php')}}", {
                    id_corrientes: id_corrientes
                }, function(data) {
                    $("#kgslts1").html(data);
                });
                $.post("{{asset('gets/getEstados.php')}}", {
                    id_corrientes: id_corrientes
                }, function(data) {
                    $("#estado1").html(data);
                });
                $.post("{{asset('gets/getDescripcion2.php')}}", {
                    id_corrientes: id_corrientes
                }, function(data) {
                    $("#descr22").html(data);
                });
            });
        })

        $("#corriente2").change(function() {

            $('#kgslts2').find('option').remove().end().append('<option value="whatever"></option>').val('whatever');

            $("#corriente2 option:selected").each(function() {
                id_corrientes = $(this).val();
                $.post("{{asset('gets/getKilos.php')}}", {
                    id_corrientes: id_corrientes
                }, function(data) {
                    $("#kgslts2").html(data);
                });
                $.post("{{asset('gets/getEstados.php')}}", {
                    id_corrientes: id_corrientes
                }, function(data) {
                    $("#estado2").html(data);
                });
                $.post("{{asset('gets/getDescripcion2.php')}}", {
                    id_corrientes: id_corrientes
                }, function(data) {
                    $("#descr33").html(data);
                });
            });
        })

        $("#corriente3").change(function() {

            $('#kgslts3').find('option').remove().end().append('<option value="whatever"></option>').val('whatever');

            $("#corriente3 option:selected").each(function() {
                id_corrientes = $(this).val();
                $.post("{{asset('gets/getKilos.php')}}", {
                    id_corrientes: id_corrientes
                }, function(data) {
                    $("#kgslts3").html(data);
                });
                $.post("{{asset('gets/getEstados.php')}}", {
                    id_corrientes: id_corrientes
                }, function(data) {
                    $("#estado3").html(data);
                });
                $.post("{{asset('gets/getDescripcion2.php')}}", {
                    id_corrientes: id_corrientes
                }, function(data) {
                    $("#descr44").html(data);
                });
            });
        })
    });
</script>
@section('navbar')

<form action="{{url('/agregardetalle')}}" method="post">
    @csrf
    <h2 class="mb-4">AGREGAR DETALLE</h2>

    <div class="mb-3">
        <label class="form-label">Transporte</label>
        <select class="form-select w-75" name="transporte" id="transporte" required>
            <option selected>Seleccionar transporte</option>
            @if (!empty($empresa))
            @foreach ($empresa as $datosTransporte)
            <option value="{{$datosTransporte->id_transp}}">{{$datosTransporte->id_transp}}</option>
            @endforeach
            @endif
        </select>
    </div>
    @foreach ($id as $datos)

    <input type="text" value="{{$datos->id_manifies}}" name="manifiesto" style="display: none;">
    @endforeach
    <div class="row mb-5">
        <div class="col">
            <label class="form-label">Corriente</label>
            <select class="form-select w-75 mb-2" name="corriente" id="corriente" required>
            </select>
        </div>
        <div class="col">
            <label class="form-label">Kgs/Lts</label>
            <select class="form-select w-75 mb-2" name="um" id="kgslts" required>
            </select>
        </div>
        <div class="col">
            <label class="form-label">Estado</label>
            <select class="form-select w-75 mb-2" name="estado" id="estado" required>
            </select>
        </div>
        <div class="col">
            <label class="form-label">Cantidad</label>
            <input type="text" class="form-control w-75 mb-2" name="cantidad" required>
        </div>
        <div class="col">
            <label class="form-label">Descripcion</label>
            <input type="text" class="form-control w-75 mb-2" name="descr_ingreso" required>
        </div>
    </div>

    <select id="descrr" name="descripcion" style="display: none;"></select>

    <input type="text" name="fecha" value="{{$fecha}}" style="display: none;">
    <input type="text" value="{{$datos->simp_multi}}" name="alta" style="display: none;">
    <input type="text" value="{{$datos->estado_det_manif}}" name="estado" style="display: none;">

    <button type="submit" class="btn btn-primary">Agregar</button>

    <a href="{{url('/listacabeceras')}}"><button type="button" class="btn btn-primary">Cabeceras</button></a>
</form>
</div>

@endsection