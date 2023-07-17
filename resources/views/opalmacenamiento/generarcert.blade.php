@extends('nav')
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script language="javascript">
    $(document).ready(function() {
        $("#operadora").change(function() {

            $('#corriente').find('option').remove().end().append('<option value="whatever"></option>').val('whatever');

            $("#operadora option:selected").each(function() {
                gener_nom = $(this).val();
                $.post("{{asset('gets/getCertifrpg.php')}}", {
                    gener_nom: gener_nom
                }, function(data) {
                    $("#certificadorpg").html(data);
                });
                $.post("{{asset('gets/getGenerador2.php')}}", {
                    gener_nom: gener_nom
                }, function(data) {
                    $("#generador").html(data);
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
    <h2 class="mb-3">GENERAR CERTIFICADO DE RPG / OSP</h2>
    <form action="" method="post">
        @csrf
        <div class="mb-3">
            <label class="form-label">Operador principal</label>
            <select class="form-select w-75" name="operador" id="operadora">
                <option selected>Seleccione su operadora</option>
                @if (!empty($empresas))

                @foreach ($empresas as $datosEmpresas)
                <option value="{{$datosEmpresas->gener_nom}}">{{$datosEmpresas->gener_nom}}</option>
                @endforeach

                @endif
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label">Nº del certificado rpg</label>
            <select class="form-select w-75" name="rpg" id="certificadorpg">
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label">Generador</label>
            <select class="form-select w-75" name="generador" id="generador">
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Buscar</button>
    </form>
</div>

@endsection