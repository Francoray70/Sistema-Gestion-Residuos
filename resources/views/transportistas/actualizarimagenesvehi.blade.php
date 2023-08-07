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
    <h2 class="mb-3">ACTUALIZAR IMAGENES DE VEHICULOS</h2>
    <form action="{{url('/actualizarvehiculoimg/'.$id->id)}}" method="post" enctype="multipart/form-data">
        @method('PATCH')
        @csrf
        <div class="mb-3">

            <label class="form-label">Patente</label>
            <input type="text" class="form-control w-75" value="{{$id->id_patente}}" name="id_patente" readonly required>
        </div>
        <div class="mb-3">
            <label class="form-label">Transporte</label>
            <input type="text" class="form-control w-75" value="{{$id->id_transp}}" name="id_transp" readonly required>
        </div>
        <div class="mb-3">
            <label class="form-label">Imagen de ruta*</label>
            @if ($id->pat_rut)
            <input type="text" value="Existe imagen cargada" readonly class="form-control w-75">
            @endif
            <input class="form-control w-75" type="file" name="pat_rut" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Titulo de propiedad*</label>
            @if ($id->pat_tit)
            <input type="text" value="Existe imagen cargada" readonly class="form-control w-75">
            @endif
            <input class="form-control w-75" type="file" name="pat_tit" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Cedula verde*</label>
            @if ($id->pat_ced_verde)
            <input type="text" value="Existe imagen cargada" readonly class="form-control w-75">
            @endif
            <input class="form-control w-75" type="file" name="pat_ced_verde" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Imagen de la V.T.V.*</label>
            @if ($id->pat_vtv_img)
            <input type="text" value="Existe imagen cargada" readonly class="form-control w-75">
            @endif
            <input class="form-control w-75" type="file" name="pat_vtv_img" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Imagen de la carga peligrosa*</label>
            @if ($id->pat_cpel_img)
            <input type="text" value="Existe imagen cargada" readonly class="form-control w-75">
            @endif
            <input class="form-control w-75" type="file" name="pat_cpel_img" required>
        </div>

        <button type="submit" class="btn btn-primary">Actualizar</button>
        <a href="{{url('/listavehiculos')}}"><button type="button" class="btn btn-primary">Listado</button></a>
    </form>
</div>

<script type="text/javascript" src="{{asset('jquery.mask.js')}}"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

@endsection