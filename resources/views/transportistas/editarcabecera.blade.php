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
    <form action="{{url('/editarmanifiesto/'.$datosManifiestos->id)}}" method="post">
        @method('PATCH')
        @csrf
        <input type="text" style="display: none;" value="{{$datosManifiestos->id_manifiesto}}" name="manifiesto">
        <input type="text" style="display: none;" value="{{$fecha}}" name="fecha">
        <input type="text" style="display: none;" value="{{$datosManifiestos->fecha_alta_manif}}" name="fecha_alta">
        <div class="mb-3">
            <label class="form-label">Generador</label>
            <select class="form-select w-50" name="generador" id="generador" required>
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
            <select class="form-select w-50" name="transporte" id="transporte" required>
                <option selected>Seleccionar transporte</option>
                @if (!empty($transporte))
                @foreach ($transporte as $datosTransporte)
                <option value="{{$datosTransporte->id_transp}}">{{$datosTransporte->id_transp}}</option>
                @endforeach
                @endif
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label">Operador</label>
            <input class="form-control w-50 mb-2" type="text" value="{{$datosManifiestos->gener_nom}}" readonly>
            <select class="form-select w-50" name="operador" id="operador" required>
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label">Tipo</label>
            <input class="form-control w-50 mb-2" type="text" value="{{$datosManifiestos->simple_multiple}}" readonly>
            <select class="form-select w-50" name="tipo" id="tipo" required>
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label">Patente</label>
            <input class="form-control w-50 mb-2" type="text" value="{{$datosManifiestos->id_patente}}" readonly>
            <select class="form-select w-50" name="patente" id="patente" required>
            </select>
        </div>
        <div class="mb-4">
            <label class="form-label">Chofer</label>
            <input class="form-control w-50 mb-2" type="text" value="{{$datosManifiestos->chofer}}" readonly>
            <select class="form-select w-50" name="chofer" id="chofer" required>
            </select>
        </div>


        <h3 class="mb-4">INSTRUCCIONES DE MANIPULACIÓN PARA LOS TRANSPORTISTAS</h3>

        <h5 class="mb-4">COMPONENTES Y CARACTERISTICAS PELIGROSAS</h5>


        <div class="mb-3">
            <label class="form-label">Inhalacion</label>
            <select class="form-select w-50" name="inhalacion" required>
                <option selected value="{{$datosManifiestos->inhalacion}}">{{$datosManifiestos->inhalacion}}</option>
                @if (($datosManifiestos->inhalacion) == 'SI')
                <option value="NO">NO</option>
                @else
                <option value="SI">SI</option>
                @endif
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label">Dermica</label>
            <select class="form-select w-50" name="dermica" required>
                <option selected value="{{$datosManifiestos->dermica}}">{{$datosManifiestos->dermica}}</option>
                @if (($datosManifiestos->dermica) == 'SI')
                <option value="NO">NO</option>
                @else
                <option value="SI">SI</option>
                @endif
            </select>
        </div>
        <div class="mb-4">
            <label class="form-label">Oral</label>
            <select class="form-select w-50" name="oral" required>
                <option selected value="{{$datosManifiestos->oral}}">{{$datosManifiestos->oral}}</option>
                @if (($datosManifiestos->oral) == 'SI')
                <option value="NO">NO</option>
                @else
                <option value="SI">SI</option>
                @endif
            </select>
        </div>

        <h5 class="mb-4">SISTEMA DE IDENTIFICACIÓN DE PELIGROSIDAD</h5>


        <div class="mb-3">
            <label class="form-label">Inflamabilidad</label>
            <select class="form-select w-50" name="inflamabilidad" required>
                <option selected value="{{$datosManifiestos->inflamabilidad}}">{{$datosManifiestos->inflamabilidad}}</option>
                @if (($datosManifiestos->inflamabilidad) == 'SI')
                <option value="NO">NO</option>
                @else
                <option value="SI">SI</option>
                @endif
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label">Toxicidad</label>
            <select class="form-select w-50" name="toxicidad" required>
                <option selected value="{{$datosManifiestos->toxicidad}}">{{$datosManifiestos->toxicidad}}</option>
                @if (($datosManifiestos->toxicidad) == 'SI')
                <option value="NO">NO</option>
                @else
                <option value="SI">SI</option>
                @endif
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label">Reactividad</label>
            <select class="form-select w-50" name="reactividad" required>
                <option selected value="{{$datosManifiestos->reactividad}}">{{$datosManifiestos->reactividad}}</option>
                @if (($datosManifiestos->reactividad) == 'SI')
                <option value="NO">NO</option>
                @else
                <option value="SI">SI</option>
                @endif
            </select>
        </div>
        <div class="mb-4">
            <label class="form-label">Instrucciones especiales</label>
            <select class="form-select w-50" name="inst_esp" required>
                <option selected value="{{$datosManifiestos->inst_esp}}">{{$datosManifiestos->inst_esp}}</option>
                @if (($datosManifiestos->inst_esp) == 'SI')
                <option value="NO">NO</option>
                @else
                <option value="SI">SI</option>
                @endif
            </select>
        </div>



        <h5 class="mb-4">INSTRUCTIVOS</h5>


        <div class="mb-3">
            <label class="form-label">Manipulación en planta trat. o disp. final</label>
            <select class="form-select w-50" name="manipulacion" required>
                <option selected value="{{$datosManifiestos->manipulacion}}">{{$datosManifiestos->manipulacion}}</option>
                @if (($datosManifiestos->manipulacion) == 'SI')
                <option value="NO">NO</option>
                @else
                <option value="SI">SI</option>
                @endif
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label">Planes de contingencia</label>
            <select class="form-select w-50" name="planes" required>
                <option selected value="{{$datosManifiestos->planes}}">{{$datosManifiestos->planes}}</option>
                @if (($datosManifiestos->planes) == 'SI')
                <option value="NO">NO</option>
                @else
                <option value="SI">SI</option>
                @endif
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label">Rol de emergencia</label>
            <select class="form-select w-50" name="rol" required>
                <option selected value="{{$datosManifiestos->rol}}">{{$datosManifiestos->rol}}</option>
                @if (($datosManifiestos->rol) == 'SI')
                <option value="NO">NO</option>
                @else
                <option value="SI">SI</option>
                @endif
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label">Hoja de ruta</label>
            <select class="form-select w-50" name="hoja" required>
                <option selected value="{{$datosManifiestos->hoja}}">{{$datosManifiestos->hoja}}</option>
                @if (($datosManifiestos->hoja) == 'SI')
                <option value="NO">NO</option>
                @else
                <option value="SI">SI</option>
                @endif
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label">Rutas alternativas</label>
            <select class="form-select w-50" name="rutas" required>
                <option selected value="{{$datosManifiestos->rutas}}">{{$datosManifiestos->rutas}}</option>
                @if (($datosManifiestos->rutas) == 'SI')
                <option value="NO">NO</option>
                @else
                <option value="SI">SI</option>
                @endif
            </select>
        </div>
        <div class="mb-4">
            <label class="form-label">Direccion de retiro</label>
            <input class="form-control w-50 mb-2" type="text" value="{{$datosManifiestos->retiro_direc}}" readonly>
            <select class="form-select w-50" name="direccion" id="direcciones" required>
            </select>
        </div>

        @endforeach

        <button type="submit" class="btn btn-primary">Actualizar</button>
        <a href="{{url('/listacabeceras')}}"><button type="button" class="btn btn-primary">Cabeceras</button></a>
    </form>
</div>

@endsection