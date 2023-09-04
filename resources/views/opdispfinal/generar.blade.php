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

    .contenedorbola {
        float: left;
        margin-top: 1.5%;
        width: 4%;
        height: 30px;
        background-color: rgb(13, 255, 0);
        border-radius: 20px;
    }

    .bola {
        border-radius: 30px;
        background-color: grey;
        width: 50%;
        height: 100%;
        float: left;
    }

    .bola:hover {
        background-color: rgb(205, 205, 205);
    }

    .bolaoff {
        border-radius: 30px;
        background-color: grey;
        width: 50%;
        height: 100%;
        float: right;
        display: none;
    }

    .bolaoff:hover {
        background-color: rgb(205, 205, 205);
    }
</style>

@section('navbar')
<div class="contenedorbola" id="contenedorbola">
    <div class="bola" id="bola">

    </div>
    <div class="bolaoff" id="bola2">

    </div>
</div>

<div class="container w-85 border p-4 mt-5" id="certifonline">
    <h2 class="mb-3">GENERAR CERTIFICADO DE DISPOSICIÓN FINAL</h2>
    <form action="{{url('/generarcertifdispfinal')}}" method="post">
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
        <a href="{{url('/listaCertificadoCabecera')}}"><button type="button" class="btn btn-primary">Listado</button></a>
        <a href="{{url('/reimprimircertif')}}"><button type="button" class="btn btn-primary">Reimprimir pdf</button></a>
    </form>
</div>

<div class="container w-85 border p-4 mt-5" id="certifoffline">
    <h2 class="mb-3">GENERAR CERTIFICADO DE DISPOSICIÓN FINAL OFFLINE</h2>
    <form action="{{url('/generarcertifdispfinaloff')}}" method="post">
        @csrf
        <div class="mb-3">
            <label class="form-label">Operador de disposicion final</label>
            <select class="form-select w-75" id="operadoraa" name="operador">
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
            <select class="form-select w-50" id="certificadodff" name="certificado">
            </select>
            <input class="form-control w-75" type="text" name="certificado2">
        </div>
        <div class="mb-3">
            <label class="form-label">Manifiesto transporte</label>
            <select class="form-select w-75" id="manifiestonacc" name="manifiesto">
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label">Generador</label>
            <select class="form-select w-75" id="generadorr" name="generador">
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Cargar</button>
        <a href="{{url('/listaCertificadoCabecera')}}"><button type="button" class="btn btn-primary">Listado</button></a>
    </form>
</div>

<script>
    var manifiestoonline = document.getElementById("certifonline");
    var manifiestooffline = document.getElementById("certifoffline");
    var contenedor = document.getElementById("contenedorbola");
    var pelota = document.getElementById("bola");
    var pelota2 = document.getElementById("bola2");

    manifiestooffline.style.display = 'none';

    document.getElementById("bola").addEventListener("click", function() {
        if (pelota.style.display = 'block') {
            manifiestoonline.style.display = 'none';
            manifiestooffline.style.display = 'block';
            contenedor.style.backgroundColor = 'red';
            pelota.style.display = 'none';
            pelota2.style.display = 'block';
        }
    }, 2000);

    document.getElementById("bola2").addEventListener("click", function() {
        if (pelota2.style.display = 'block') {
            manifiestoonline.style.display = 'block';
            manifiestooffline.style.display = 'none';
            contenedor.style.backgroundColor = 'rgb(13, 255, 0)';
            pelota.style.display = 'block';
            pelota2.style.display = 'none';
        }
    }, 2000);
</script>
@endsection