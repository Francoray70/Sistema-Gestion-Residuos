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
        $("#generador").change(function() {

            $('#operador').find('option').remove().end().append('<option value="whatever"></option>').val('whatever');

            $("#generador option:selected").each(function() {
                nom_comp = $(this).val();
                $.post("{{asset('gets/getDirecciones.php')}}", {
                    nom_comp: nom_comp
                }, function(data) {
                    $("#direcciones").html(data);
                });
                $.post("{{asset('gets/getOperador.php')}}", {
                    nom_comp: nom_comp
                }, function(data) {
                    $("#operador").html(data);
                });
                $.post("{{asset('gets/getTipo.php')}}", {
                    nom_comp: nom_comp
                }, function(data) {
                    $("#tipo").html(data);
                });
            });
        })
    });
</script>

<script language="javascript">
    $(document).ready(function() {
        $("#operador").change(function() {

            $('#tipo2').find('option').remove().end().append('<option value="whatever"></option>').val('whatever');

            $("#operador option:selected").each(function() {
                nom_comp = $(this).val();
                $.post("{{asset('gets/getTipo2.php')}}", {
                    nom_comp: nom_comp
                }, function(data) {
                    $("#tipo2").html(data);
                });
            });
        })
    });
</script>

<script language="javascript">
    $(document).ready(function() {
        $("#transporte").change(function() {

            $('#manifiesto').find('option').remove().end().append('<option value="whatever"></option>').val('whatever');

            $("#transporte option:selected").each(function() {
                id_transp = $(this).val();
                $.post("{{asset('gets/getPatente.php')}}", {
                    id_transp: id_transp
                }, function(data) {
                    $("#patente").html(data);
                });
                $.post("{{asset('gets/getChofer.php')}}", {
                    id_transp: id_transp
                }, function(data) {
                    $("#chofer").html(data);
                });
                $.post("{{asset('gets/getTransporte.php')}}", {
                    id_transp: id_transp
                }, function(data) {
                    $("#trans").html(data);
                });
                $.post("{{asset('gets/getCorriente.php')}}", {
                    id_transp: id_transp
                }, function(data) {
                    $("#corriente").html(data);
                });
                $.post("{{asset('gets/getCorriente.php')}}", {
                    id_transp: id_transp
                }, function(data) {
                    $("#corriente1").html(data);
                });
                $.post("{{asset('gets/getCorriente.php')}}", {
                    id_transp: id_transp
                }, function(data) {
                    $("#corriente2").html(data);
                });
                $.post("{{asset('gets/getCorriente.php')}}", {
                    id_transp: id_transp
                }, function(data) {
                    $("#corriente3").html(data);
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

<!-------------------------

----------
-----
----
-----
----------

-----
----------------------------------------------FIN DE ESTILOS ARRANQUE DE PROGRAMA------------


-------------------------------->

@section('navbar')

@foreach ($manifiesto as $datosManifiestos)


<div class="container w-85 border p-4 mt-5">
    <h2 class="mb-3">EDITAR CABECERAS DE MANIFIESTOS</h2>
    <form action="{{url('/editarcabecera/'.$datosManifiestos->id)}}" method="post">
        @method('PATCH')
        @csrf
        <input type="text" style="display: none;" value="{{$datosManifiestos->id_manifiesto}}" name="manifiesto">
        <input type="text" style="display: none;" value="{{$userId}}" name="idusuario">
        <div class="mb-3">
            <label class="form-label">Generador</label>
            <select class="form-select w-75" name="generador" id="generador" required>
                <option selected>Seleccionar generador</option>
                @if (!empty($generador))
                @foreach ($generador as $datosGenerador)
                <option value="{{$datosGenerador->nom_comp}}">{{$datosGenerador->nom_comp}}</option>
                @endforeach
                @endif
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label">Transporte</label>
            <input class="form-control w-75 mb-2" type="text" name="" value="{{$datosManifiestos->id_transp}}">
        </div>
        <div class="mb-3">
            <label class="form-label">Operador</label>
            <input class="form-control w-75 mb-2" type="text" name="" value="{{$datosManifiestos->gener_nom}}">
        </div>
        <div class="mb-3">
            <label class="form-label">Tipo</label>
            <select class="form-select w-75" name="tipo" id="tipo" required>
            </select>
            <select id="tipo2" name="tipo2" style="display: none;"></select>
        </div>
        <div class="mb-3">
            <label class="form-label">Patente</label>
            <select class="form-select w-75" name="patente" id="patente" required>
            </select>
        </div>
        <div class="mb-4">
            <label class="form-label">Chofer</label>
            <select class="form-select w-75" name="chofer" id="chofer" required>
            </select>
        </div>


        <h3 class="mb-4">INSTRUCCIONES DE MANIPULACIÓN PARA LOS TRANSPORTISTAS</h3>

        <h5 class="mb-4">COMPONENTES Y CARACTERISTICAS PELIGROSAS</h5>


        <div class="mb-3">
            <label class="form-label">Inhalacion</label>
            <select class="form-select w-75" name="inhalacion" required>
                <option selected>Seleccione</option>
                <option value="SI">Si</option>
                <option value="NO">No</option>
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label">Dermica</label>
            <select class="form-select w-75" name="dermica" required>
                <option selected>Seleccione</option>
                <option value="SI">Si</option>
                <option value="NO">No</option>
            </select>
        </div>
        <div class="mb-4">
            <label class="form-label">Oral</label>
            <select class="form-select w-75" name="oral" required>
                <option selected>Seleccione</option>
                <option value="SI">Si</option>
                <option value="NO">No</option>
            </select>
        </div>

        <h5 class="mb-4">SISTEMA DE IDENTIFICACIÓN DE PELIGROSIDAD</h5>


        <div class="mb-3">
            <label class="form-label">Inflamabilidad</label>
            <select class="form-select w-75" name="inflamabilidad" required>
                <option selected>Seleccione</option>
                <option value="SI">Si</option>
                <option value="NO">No</option>
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label">Toxicidad</label>
            <select class="form-select w-75" name="toxicidad" required>
                <option selected>Seleccione</option>
                <option value="SI">Si</option>
                <option value="NO">No</option>
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label">Reactividad</label>
            <select class="form-select w-75" name="reactividad" required>
                <option selected>Seleccione</option>
                <option value="SI">Si</option>
                <option value="NO">No</option>
            </select>
        </div>
        <div class="mb-4">
            <label class="form-label">Instrucciones especiales</label>
            <select class="form-select w-75" name="inst_esp" required>
                <option selected>Seleccione</option>
                <option value="SI">Si</option>
                <option value="NO">No</option>
            </select>
        </div>



        <h5 class="mb-4">INSTRUCTIVOS</h5>


        <div class="mb-3">
            <label class="form-label">Manipulación en planta trat. o disp. final</label>
            <select class="form-select w-75" name="manipulacion" required>
                <option selected>Seleccione</option>
                <option value="SI">Si</option>
                <option value="NO">No</option>
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label">Planes de contingencia</label>
            <select class="form-select w-75" name="planes" required>
                <option selected>Seleccione</option>
                <option value="SI">Si</option>
                <option value="NO">No</option>
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label">Rol de emergencia</label>
            <select class="form-select w-75" name="rol" required>
                <option selected>Seleccione</option>
                <option value="SI">Si</option>
                <option value="NO">No</option>
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label">Hoja de ruta</label>
            <select class="form-select w-75" name="hoja" required>
                <option selected>Seleccione</option>
                <option value="SI">Si</option>
                <option value="NO">No</option>
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label">Rutas alternativas</label>
            <select class="form-select w-75" name="rutas" required>
                <option selected>Seleccione</option>
                <option value="SI">Si</option>
                <option value="NO">No</option>
            </select>
        </div>
        <div class="mb-4">
            <label class="form-label">Direccion de retiro</label>
            <select class="form-select w-75" name="direccion" id="direcciones" required>
            </select>
        </div>

        @endforeach

        <button type="submit" class="btn btn-primary">Editar</button>
    </form>
</div>

@endsection