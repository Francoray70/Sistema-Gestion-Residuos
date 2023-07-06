@extends('nav')

<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script language="javascript">
    $(document).ready(function() {
        $("#corriente").change(function() {

            $("#corriente option:selected").each(function() {
                id_corrientes = $(this).val();
                $.post("{{asset('gets/getDescripcion.php')}}", {
                    id_corrientes: id_corrientes
                }, function(data) {
                    $("#descripcion").html(data);
                });

                $.post("{{asset('gets/getUm2.php')}}", {
                    id_corrientes: id_corrientes
                }, function(data) {
                    $("#um").html(data);
                });

                $.post("{{asset('gets/getEstados.php')}}", {
                    id_corrientes: id_corrientes
                }, function(data) {
                    $("#estado").html(data);
                });

                $.post("{{asset('gets/getPeligrosidad.php')}}", {
                    id_corrientes: id_corrientes
                }, function(data) {
                    $("#peligrosidad").html(data);
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
    <h2 class="mb-3">CORRIENTES DE GENERADORES</h2>
    <form action="{{url('/corrientesgenerador')}}" method="post">
        @csrf
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Generador</label>
            <select name="generador" class="form-select w-75" aria-label="Default select example">
                <option selected>Seleccionar generador</option>
                @if (!empty($generador))

                @foreach ($generador as $datosGenerador)
                <option value="{{$datosGenerador->nom_comp}}">{{$datosGenerador->nom_comp}}</option>
                @endforeach

                @endif
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label">Corriente de residuo</label>
            <select name="id_corrientes" id="corriente" class="form-select w-75">
                <option selected>Seleccionar corriente</option>
                @if (!empty($corrientes))

                @foreach ($corrientes as $datosCorrientes)
                <option value="{{$datosCorrientes->id_corrientes}}">{{$datosCorrientes->id_corrientes}}</option>
                @endforeach

                @endif
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label">Descripcion</label>
            <select class="form-select w-75" name="descripcion" id="descripcion">
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label">Unidad de medida</label>
            <select class="form-select w-75" name="um" id="um">
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label">Estado</label>
            <select class="form-select w-75" name="estado" id="estado">
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label">Peligrosidad</label>
            <select class="form-select w-75" name="peligrosidad" id="peligrosidad">
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label">Cantidad estimada anual</label>
            <input type="text" class="form-control w-75" name="cantidad">
        </div>

        <button type="submit" class="btn btn-primary">Cargar</button>
        <a href="{{url('/listacorrientesgeneradores')}}"><button type="button" class="btn btn-primary">Listado</button></a>
        <a href="{{url('/listacantidades')}}"><button type="button" class="btn btn-primary">Cantidad anual</button></a>
    </form>
</div>

@endsection