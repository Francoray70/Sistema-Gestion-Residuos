<?php

$fecha = date("Y-m-d");
?>

@extends('nav')

<!-----------------------------SCRIPTS PREVIOS-------------------------------------------->

<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<style>
    .container {
        background-color: rgb(228, 228, 228);
        font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
    }
</style>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

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

<!-----------------------------FIN DE SCRIPTS PREVIOS-------------------------------------------->


@section('navbar')

<div class="container w-85 border p-4 mt-5">
    <h2 class="mb-3">GENERADORES</h2>
    <form action="{{ url('/generadores') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">

            <label class="form-label">Generador</label>
            <select name="nom_comp" id="generador" class="form-select w-75" required>
                <option selected>Seleccione una opción</option>
                @if (!empty($datosEmpresa))

                @foreach ($datosEmpresa as $Empresa)
                <option value="{{ $Empresa->nombre }}">{{ $Empresa->nombre }}</option>
                @endforeach

                @endif
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label">Cuit</label>
            <select name="cuit" id="cuit" class="form-select w-75" required>
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label">Tipo de IVA</label>
            <select name="cod_iva" class="form-select w-75" required>
                <option selected>Seleccione una opción</option>
                <option name="cod_iva" value="Responsable inscripto">Responsable inscripto</option>
                <option name="cod_iva" value="Monotributo">Monotributo</option>
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label">Dirección</label>
            <input type="text" name="direccion" class="form-control w-75" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Provincia</label>
            <select name="provincia" id="provincia" class="form-select w-75" required>
                <option selected>Seleccione su provincia</option>
                @if (!empty($datosProvincia))

                @foreach ($datosProvincia as $Provincias)
                <option value="{{ $Provincias->provincia }}">{{ $Provincias->provincia }}</option>
                @endforeach

                @endif
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label">Ciudad</label>
            <select name="ciudad" id="ciudad" class="form-select w-75" required>
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label">CP</label>
            <select name="cod_postal" id="cp" class="form-select w-75" required>
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label">Nombre</label>
            <input type="text" name="nom_cont" class="form-control w-75" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Apellido</label>
            <input type="text" name="ape_cont" class="form-control w-75" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Actividad</label>
            <select name="act" class="form-select w-75" required>
                <option selected>Seleccione una opción</option>
                @if (!empty($datosActividades))

                @foreach ($datosActividades as $actividades)
                <option value="{{ $actividades->actividades }}">{{ $actividades->actividades }}</option>
                @endforeach

                @endif
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label">Telefono</label>
            <input type="text" name="num_tel" class="form-control w-75" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Celular</label>
            <input type="text" name="num_cel" class="form-control w-75" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Habilitación provincial n°</label>
            <input type="text" name="cli_nro_hab_pro" class="form-control w-75" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Habilitación provincial vto</label>
            <input type="date" name="cli_vto_hab_pro" class="form-control w-75" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Habilitación provincial</label>
            <input name="cli_ima_hab_pro" class="form-control w-75" type="file" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Habilitación nacional n°</label>
            <input type="text" name="cli_nro_hab_mun" class="form-control w-75" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Habilitación nacional vto</label>
            <input type="date" name="cli_vto_hab_mun" class="form-control w-75" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Habilitación nacional</label>
            <input name="cli_ima_hab_mun" class="form-control w-75" type="file" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Habilitación comercial n°</label>
            <input type="text" name="cli_nro_hab_com" class="form-control w-75" required>
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Habilitación comercial vto:</label>
            <input type="date" name="cli_vto_hab_com" class="form-control w-75" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Habilitación comercial</label>
            <input name="cli_ima_hab_com" class="form-control w-75" type="file" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Email</label>
            <input type="email" name="dir_correo" class="form-control w-75" required>
        </div>

        <input type="text" name="fecha_alta" value="{{$fecha}}" style="display: none">
        <input type="text" name="fecha_usu_modi" value="{{$fecha}}" style="display: none">
        <input type="text" value="{{$fecha}}" name="updated_at" style="display: none;">
        <input type="text" name="clte_act" value="ALTA" style="display: none">
        <button type="submit" class="btn btn-primary">Cargar</button>
    </form>
</div>

<script type="text/javascript" src="{{asset('jquery.mask.js')}}"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

@endsection