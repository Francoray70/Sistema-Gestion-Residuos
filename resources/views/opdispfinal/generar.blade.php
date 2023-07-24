@extends('nav')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<script language="javascript">
    $(document).ready(function() {
        $("#operadora").change(function() {

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



<script language="javascript">
    $(document).ready(function() {
        $("#operadoraa").change(function() {

            $('#certificadodff').find('option').remove().end().append('<option value="whatever"></option>').val('whatever');

            $("#operadoraa option:selected").each(function() {
                id_oper_df = $(this).val();

                $.post("{{asset('gets/getManidet.php')}}", {
                    gener_nom: id_oper_df
                }, function(data) {
                    $("#manifiestonacc").html(data);
                });
                $.post("{{asset('gets/getCertifodfoff.php')}}", {
                    id_operador_df: id_oper_df
                }, function(data) {
                    $("#certificadodff").html(data);
                });
            });
        })
    });
</script>


<script language="javascript">
    $(document).ready(function() {
        $("#manifiestonacc").change(function() {


            $("#manifiestonacc option:selected").each(function() {
                id_manifiesto = $(this).val();
                $.post("{{asset('gets/getGenerador.php')}}", {
                    id_manifiesto: id_manifiesto
                }, function(data) {
                    $("#generadorr").html(data);
                });
                $.post("{{asset('gets/getTranspor.php')}}", {
                    id_manifiesto: id_manifiesto
                }, function(data) {
                    $("#transporr").html(data);
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
    <h2 class="mb-3">GENERAR CERTIFICADO DE DISPOSICIÓN FINAL</h2>
    <form action="{{route('generarelcertificado')}}" method="get">
        @csrf
        <div class="mb-3">
            <label class="form-label">Operador de disposicion final</label>
            <select class="form-select w-75" id="operadora" name="operador">
                <option selected>Seleccionar operadora</option>
                @if (!empty($empresas))
                @foreach ($empresas as $datosEmpresas)
                <option value="{{$datosEmpresas->id_operador_df}}">{{$datosEmpresas->id_operador_df}}</option>
                @endforeach
                @endif
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label">Nº de certificado de disposicion final</label>
            <select class="form-select w-75" id="certificadodf" name="certificado">
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label">Manifiesto transporte</label>
            <select class="form-select w-75" id="manifiestonac" name="manifiesto">
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label">Generador</label>
            <select class="form-select w-75" id="generador" name="generador">
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Cargar</button>
    </form>
</div>

@endsection