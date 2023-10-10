<?php

use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use App\Models\Transportista;

$fecha = Carbon::now();
$user = Auth::user();
$userEmpresa = $user->empresa;
$userId = $user->id;

$numManifiesto = Transportista::where('id_transp', 'LIKE', '%' . $userEmpresa . '%')->first();
$NumfinalManifiesto = ($numManifiesto->trans_nro_hab_pro) . "-" . ($numManifiesto->manifiesto_actual);

$manifiestoPActualizar = $numManifiesto->manifiesto_actual;
$NuevoNumManifiesto = $manifiestoPActualizar + 1;

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

<script language="javascript">
    $(document).ready(function() {
        $("#generadorr").change(function() {

            $('#operadorr').find('option').remove().end().append('<option value="whatever"></option>').val('whatever');

            $("#generadorr option:selected").each(function() {
                nom_comp = $(this).val();
                $.post("{{asset('gets/getDirecciones.php')}}", {
                    nom_comp: nom_comp
                }, function(data) {
                    $("#direccioness").html(data);
                });
                $.post("{{asset('gets/getOperador.php')}}", {
                    nom_comp: nom_comp
                }, function(data) {
                    $("#operadorr").html(data);
                });
                $.post("{{asset('gets/getTipo.php')}}", {
                    nom_comp: nom_comp
                }, function(data) {
                    $("#tipoo").html(data);
                });
            });
        })
    });
</script>

<script language="javascript">
    $(document).ready(function() {
        $("#operadorr").change(function() {

            $('#tipo22').find('option').remove().end().append('<option value="whatever"></option>').val('whatever');

            $("#operadorr option:selected").each(function() {
                nom_comp = $(this).val();
                $.post("{{asset('gets/getTipo2.php')}}", {
                    nom_comp: nom_comp
                }, function(data) {
                    $("#tipo22").html(data);
                });
            });
        })
    });
</script>

<script language="javascript">
    $(document).ready(function() {
        $("#transportee").change(function() {

            $('#manifiestoo').find('option').remove().end().append('<option value="whatever"></option>').val('whatever');

            $("#transportee option:selected").each(function() {
                id_transp = $(this).val();
                $.post("{{asset('gets/getPatente.php')}}", {
                    id_transp: id_transp
                }, function(data) {
                    $("#patentee").html(data);
                });
                $.post("{{asset('gets/getChofer.php')}}", {
                    id_transp: id_transp
                }, function(data) {
                    $("#choferr").html(data);
                });
                $.post("{{asset('gets/getTransporte.php')}}", {
                    id_transp: id_transp
                }, function(data) {
                    $("#transs").html(data);
                });
                $.post("{{asset('gets/getCorriente.php')}}", {
                    id_transp: id_transp
                }, function(data) {
                    $("#corrientee").html(data);
                });
                $.post("{{asset('gets/getCorriente.php')}}", {
                    id_transp: id_transp
                }, function(data) {
                    $("#corriente11").html(data);
                });
                $.post("{{asset('gets/getCorriente.php')}}", {
                    id_transp: id_transp
                }, function(data) {
                    $("#corriente22").html(data);
                });
                $.post("{{asset('gets/getCorriente.php')}}", {
                    id_transp: id_transp
                }, function(data) {
                    $("#corriente33").html(data);
                });
            });
        })
    });
</script>

<script language="javascript">
    $(document).ready(function() {
        $("#corrientee").change(function() {

            $('#kgsltss').find('option').remove().end().append('<option value="whatever"></option>').val('whatever');

            $("#corrientee option:selected").each(function() {
                id_corrientes = $(this).val();
                $.post("{{asset('gets/getKilos.php')}}", {
                    id_corrientes: id_corrientes
                }, function(data) {
                    $("#kgsltss").html(data);
                });
                $.post("{{asset('gets/getEstados.php')}}", {
                    id_corrientes: id_corrientes
                }, function(data) {
                    $("#estadoo").html(data);
                });
                $.post("{{asset('gets/getDescripcion2.php')}}", {
                    id_corrientes: id_corrientes
                }, function(data) {
                    $("#descrr").html(data);
                });
            });
        })

        $("#corriente11").change(function() {

            $('#kgslts11').find('option').remove().end().append('<option value="whatever"></option>').val('whatever');

            $("#corriente11 option:selected").each(function() {
                id_corrientes = $(this).val();
                $.post("{{asset('gets/getKilos.php')}}", {
                    id_corrientes: id_corrientes
                }, function(data) {
                    $("#kgslts11").html(data);
                });
                $.post("{{asset('gets/getEstados.php')}}", {
                    id_corrientes: id_corrientes
                }, function(data) {
                    $("#estado11").html(data);
                });
                $.post("{{asset('gets/getDescripcion2.php')}}", {
                    id_corrientes: id_corrientes
                }, function(data) {
                    $("#descr22").html(data);
                });
            });
        })

        $("#corriente22").change(function() {

            $('#kgslts22').find('option').remove().end().append('<option value="whatever"></option>').val('whatever');

            $("#corriente22 option:selected").each(function() {
                id_corrientes = $(this).val();
                $.post("{{asset('gets/getKilos.php')}}", {
                    id_corrientes: id_corrientes
                }, function(data) {
                    $("#kgslts22").html(data);
                });
                $.post("{{asset('gets/getEstados.php')}}", {
                    id_corrientes: id_corrientes
                }, function(data) {
                    $("#estado22").html(data);
                });
                $.post("{{asset('gets/getDescripcion2.php')}}", {
                    id_corrientes: id_corrientes
                }, function(data) {
                    $("#descr33").html(data);
                });
            });
        })

        $("#corriente33").change(function() {

            $('#kgslts33').find('option').remove().end().append('<option value="whatever"></option>').val('whatever');

            $("#corriente33 option:selected").each(function() {
                id_corrientes = $(this).val();
                $.post("{{asset('gets/getKilos.php')}}", {
                    id_corrientes: id_corrientes
                }, function(data) {
                    $("#kgslts33").html(data);
                });
                $.post("{{asset('gets/getEstados.php')}}", {
                    id_corrientes: id_corrientes
                }, function(data) {
                    $("#estado33").html(data);
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

<!-------------------------
----------------------------------------------FIN DE ESTILOS ARRANQUE DE PROGRAMA------------
-------------------------------->

@section('navbar')
<!-------------------------------------------------------- PARTE ONLINE DEL SISTEMA PARA CUANDO LO USE UN ENTE ------------------------------------------->

<!-- <div class="contenedorbola" id="contenedorbola">
    <div class="bola" id="bola">

    </div>
    <div class="bolaoff" id="bola2">

    </div>
</div>

<div class="container w-85 border p-4 mt-5" id="manifiestoOnline">
    <h2 class="mb-3">ALTA DE MANIFIESTOS</h2>
    <form action="{{url('/generarmanifiesto')}}" method="post">
        @csrf
        <input type="text" value="{{$NumfinalManifiesto}}" name="manifiesto" style="display: none;">
        <input type="text" value="{{$NuevoNumManifiesto}}" name="nuevomanifiesto" style="display: none;">
        <input type="text" value="{{$userId}}" name="idusuario" style="display: none;">
        <div class="mb-3">
            <label class="form-label">Generador</label>
            <select class="form-select w-75" name="generador" id="generador" required>
                <option>Seleccionar generador</option>
                @if (!empty($generador))
                @foreach ($generador as $datosGenerador)
                <option value="{{$datosGenerador->nom_comp}}">{{$datosGenerador->nom_comp}}</option>
                @endforeach
                @endif
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label">Transporte</label>
            <select class="form-select w-75" name="transporte" id="transporte" required>
                <option>Seleccionar transporte</option>
                @if (!empty($transportes))
                @foreach ($transportes as $datosTransporte)
                <option value="{{$datosTransporte->id_transp}}">{{$datosTransporte->id_transp}}</option>
                @endforeach
                @endif
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label">Operador</label>
            <select class="form-select w-75" name="operador" id="operador" required>
            </select>
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
                <option value="">Seleccione</option>
                <option value="SI">Si</option>
                <option value="NO">No</option>
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label">Dermica</label>
            <select class="form-select w-75" name="dermica" required>
                <option value="">Seleccione</option>
                <option value="SI">Si</option>
                <option value="NO">No</option>
            </select>
        </div>
        <div class="mb-4">
            <label class="form-label">Oral</label>
            <select class="form-select w-75" name="oral" required>
                <option value="">Seleccione</option>
                <option value="SI">Si</option>
                <option value="NO">No</option>
            </select>
        </div>

        <h5 class="mb-4">SISTEMA DE IDENTIFICACIÓN DE PELIGROSIDAD</h5>


        <div class="mb-3">
            <label class="form-label">Inflamabilidad</label>
            <select class="form-select w-75" name="inflamabilidad" required>
                <option value="">Seleccione</option>
                <option value="SI">Si</option>
                <option value="NO">No</option>
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label">Toxicidad</label>
            <select class="form-select w-75" name="toxicidad" required>
                <option value="">Seleccione</option>
                <option value="SI">Si</option>
                <option value="NO">No</option>
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label">Reactividad</label>
            <select class="form-select w-75" name="reactividad" required>
                <option value="">Seleccione</option>
                <option value="SI">Si</option>
                <option value="NO">No</option>
            </select>
        </div>
        <div class="mb-4">
            <label class="form-label">Instrucciones especiales</label>
            <select class="form-select w-75" name="inst_esp" required>
                <option value="">Seleccione</option>
                <option value="SI">Si</option>
                <option value="NO">No</option>
            </select>
        </div>



        <h5 class="mb-4">INSTRUCTIVOS</h5>


        <div class="mb-3">
            <label class="form-label">Manipulación en planta trat. o disp. final</label>
            <select class="form-select w-75" name="manipulacion" required>
                <option value="">Seleccione</option>
                <option value="SI">Si</option>
                <option value="NO">No</option>
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label">Planes de contingencia</label>
            <select class="form-select w-75" name="planes" required>
                <option value="">Seleccione</option>
                <option value="SI">Si</option>
                <option value="NO">No</option>
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label">Rol de emergencia</label>
            <select class="form-select w-75" name="rol" required>
                <option value="">Seleccione</option>
                <option value="SI">Si</option>
                <option value="NO">No</option>
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label">Hoja de ruta</label>
            <select class="form-select w-75" name="hoja" required>
                <option value="">Seleccione</option>
                <option value="SI">Si</option>
                <option value="NO">No</option>
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label">Rutas alternativas</label>
            <select class="form-select w-75" name="rutas" required>
                <option value="">Seleccione</option>
                <option value="SI">Si</option>
                <option value="NO">No</option>
            </select>
        </div>
        <div class="mb-4">
            <label class="form-label">Direccion de retiro</label>
            <select class="form-select w-75" name="direccion" id="direcciones" required>
            </select>
        </div>


        <h5 class="mb-4">CORRIENTES</h5>

        <div class="row mb-5">
            <div class="col">
                <label class="form-label">Corriente</label>
                <select class="form-select w-75 mb-2" name="corriente" id="corriente" required>
                </select>
                <select class="form-select w-75 mb-2" name="corriente1" id="corriente1">
                </select>
                <select class="form-select w-75 mb-2" name="corriente2" id="corriente2">
                </select>
                <select class="form-select w-75 mb-2" name="corriente3" id="corriente3">
                </select>
            </div>
            <div class="col">
                <label class="form-label">Kgs/Lts</label>
                <select class="form-select w-75 mb-2" name="um" id="kgslts" required>
                </select>
                <select class="form-select w-75 mb-2" name="um1" id="kgslts1">
                </select>
                <select class="form-select w-75 mb-2" name="um2" id="kgslts2">
                </select>
                <select class="form-select w-75 mb-2" name="um3" id="kgslts3">
                </select>
            </div>
            <div class="col">
                <label class="form-label">Estado</label>
                <select class="form-select w-75 mb-2" name="estado" id="estado" required>
                </select>
                <select class="form-select w-75 mb-2" name="estado1" id="estado1">
                </select>
                <select class="form-select w-75 mb-2" name="estado2" id="estado2">
                </select>
                <select class="form-select w-75 mb-2" name="estado3" id="estado3">
                </select>
            </div>
            <div class="col">
                <label class="form-label">Cantidad</label>
                <input type="text" class="form-control w-75 mb-2" name="cantidad" required>
                <input type="text" class="form-control w-75 mb-2" name="cantidad1">
                <input type="text" class="form-control w-75 mb-2" name="cantidad2">
                <input type="text" class="form-control w-75 mb-2" name="cantidad3">
            </div>
            <div class="col">
                <label class="form-label">Descripcion</label>
                <input type="text" class="form-control w-75 mb-2" name="descr_ingreso" required>
                <input type="text" class="form-control w-75 mb-2" name="descr_ingreso1">
                <input type="text" class="form-control w-75 mb-2" name="descr_ingreso2">
                <input type="text" class="form-control w-75 mb-2" name="descr_ingreso3">
            </div>
        </div>

        <select style="display: none;" id="descrr" name="descripcion"></select>
        <select style="display: none;" id="descr22" name="descripcion1"></select>
        <select style="display: none;" id="descr33" name="descripcion2"></select>
        <select style="display: none;" id="descr44" name="descripcion3"></select>

        <input type="text" value="{{$fecha}}" name="fecha" style="display: none;">

        <button type="submit" class="btn btn-primary">Cargar</button>

        <a href="{{url('/listacabeceras')}}"><button type="button" class="btn btn-primary">Cabeceras</button></a>
        <a href="{{url('/reimprimirpdf')}}"><button type="button" class="btn btn-primary">Reimprimir PDF</button></a>
    </form>
</div> -->

<div class="container w-85 border p-4 mt-5" id="manifiestoOffline">
    <h2 class="mb-3">ALTA DE MANIFIESTOS</h2>
    <form action="{{url('/generarmanifiestooffline')}}" method="post">
        @csrf
        <input type="text" value="{{$NuevoNumManifiesto}}" name="nuevomanifiesto" style="display: none;">
        <input type="text" value="{{$userId}}" name="idusuario" style="display: none;">

        @if (!empty($transportes))
        @foreach ($transportes as $datoDelTransporte)

        <div class="mb-3">
            <label class="form-label">N° manifiesto</label>
            <input type="text" value="{{$datoDelTransporte->trans_nro_hab_pro}}-" class="form-control" readonly name="manifiesto" style="width: 5%;">
            <input type="text" name="manifiesto2" class="form-control" pattern="[0-9]{6,7}" style="width: 30%;">
        </div>
        @endforeach
        @endif
        <div class="mb-3">
            <label class="form-label">Generador</label>
            <select class="form-select w-75" name="generador" id="generador" required>
                <option value="">Seleccionar generador</option>
                @if (!empty($generador))
                @foreach ($generador as $datosGenerador)
                <option value="{{$datosGenerador->nom_comp}}">{{$datosGenerador->nom_comp}}</option>
                @endforeach
                @endif
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label">Transporte</label>
            <select class="form-select w-75" name="transporte" id="transporte" required>
                <option value="">Seleccionar transporte</option>
                @if (!empty($transportes))
                @foreach ($transportes as $datosTransporte)
                <option value="{{$datosTransporte->id_transp}}">{{$datosTransporte->id_transp}}</option>
                @endforeach
                @endif
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label">Operador</label>
            <select class="form-select w-75" name="operador" id="operador" required>
            </select>
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
        <div class="mb-4">
            <label class="form-label">Fecha</label>
            <input type="date" class="form-select w-75" name="fechaNueva" required>
        </div>


        <h3 class="mb-4">INSTRUCCIONES DE MANIPULACIÓN PARA LOS TRANSPORTISTAS</h3>

        <h5 class="mb-4">COMPONENTES Y CARACTERISTICAS PELIGROSAS</h5>


        <div class="mb-3">
            <label class="form-label">Inhalacion</label>
            <select class="form-select w-75" name="inhalacion" required>
                <option value="">Seleccione</option>
                <option value="SI">Si</option>
                <option value="NO">No</option>
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label">Dermica</label>
            <select class="form-select w-75" name="dermica" required>
                <option value="">Seleccione</option>
                <option value="SI">Si</option>
                <option value="NO">No</option>
            </select>
        </div>
        <div class="mb-4">
            <label class="form-label">Oral</label>
            <select class="form-select w-75" name="oral" required>
                <option value="">Seleccione</option>
                <option value="SI">Si</option>
                <option value="NO">No</option>
            </select>
        </div>

        <h5 class="mb-4">SISTEMA DE IDENTIFICACIÓN DE PELIGROSIDAD</h5>


        <div class="mb-3">
            <label class="form-label">Inflamabilidad</label>
            <select class="form-select w-75" name="inflamabilidad" required>
                <option value="">Seleccione</option>
                <option value="SI">Si</option>
                <option value="NO">No</option>
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label">Toxicidad</label>
            <select class="form-select w-75" name="toxicidad" required>
                <option value="">Seleccione</option>
                <option value="SI">Si</option>
                <option value="NO">No</option>
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label">Reactividad</label>
            <select class="form-select w-75" name="reactividad" required>
                <option value="">Seleccione</option>
                <option value="SI">Si</option>
                <option value="NO">No</option>
            </select>
        </div>
        <div class="mb-4">
            <label class="form-label">Instrucciones especiales</label>
            <select class="form-select w-75" name="inst_esp" required>
                <option value="">Seleccione</option>
                <option value="SI">Si</option>
                <option value="NO">No</option>
            </select>
        </div>



        <h5 class="mb-4">INSTRUCTIVOS</h5>


        <div class="mb-3">
            <label class="form-label">Manipulación en planta trat. o disp. final</label>
            <select class="form-select w-75" name="manipulacion" required>
                <option value="">Seleccione</option>
                <option value="SI">Si</option>
                <option value="NO">No</option>
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label">Planes de contingencia</label>
            <select class="form-select w-75" name="planes" required>
                <option value="">Seleccione</option>
                <option value="SI">Si</option>
                <option value="NO">No</option>
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label">Rol de emergencia</label>
            <select class="form-select w-75" name="rol" required>
                <option value="">Seleccione</option>
                <option value="SI">Si</option>
                <option value="NO">No</option>
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label">Hoja de ruta</label>
            <select class="form-select w-75" name="hoja" required>
                <option value="">Seleccione</option>
                <option value="SI">Si</option>
                <option value="NO">No</option>
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label">Rutas alternativas</label>
            <select class="form-select w-75" name="rutas" required>
                <option value="">Seleccione</option>
                <option value="SI">Si</option>
                <option value="NO">No</option>
            </select>
        </div>
        <div class="mb-4">
            <label class="form-label">Direccion de retiro</label>
            <select class="form-select w-75" name="direccion" id="direcciones" required>
            </select>
        </div>


        <h5 class="mb-4">CORRIENTES</h5>

        <div class="row mb-5">
            <div class="col">
                <label class="form-label">Corriente</label>
                <select class="form-select w-75 mb-2" name="corriente" id="corriente" required>
                </select>
                <select class="form-select w-75 mb-2" name="corriente1" id="corriente1">
                </select>
                <select class="form-select w-75 mb-2" name="corriente2" id="corriente2">
                </select>
                <select class="form-select w-75 mb-2" name="corriente3" id="corriente3">
                </select>
            </div>
            <div class="col">
                <label class="form-label">Kgs/Lts</label>
                <select class="form-select w-75 mb-2" name="um" id="kgslts" required>
                </select>
                <select class="form-select w-75 mb-2" name="um1" id="kgslts1">
                </select>
                <select class="form-select w-75 mb-2" name="um2" id="kgslts2">
                </select>
                <select class="form-select w-75 mb-2" name="um3" id="kgslts3">
                </select>
            </div>
            <div class="col">
                <label class="form-label">Estado</label>
                <select class="form-select w-75 mb-2" name="estado" id="estado" required>
                </select>
                <select class="form-select w-75 mb-2" name="estado1" id="estado1">
                </select>
                <select class="form-select w-75 mb-2" name="estado2" id="estado2">
                </select>
                <select class="form-select w-75 mb-2" name="estado3" id="estado3">
                </select>
            </div>
            <div class="col">
                <label class="form-label">Cantidad</label>
                <input type="text" class="form-control w-75 mb-2" name="cantidad">
                <input type="text" class="form-control w-75 mb-2" name="cantidad1">
                <input type="text" class="form-control w-75 mb-2" name="cantidad2">
                <input type="text" class="form-control w-75 mb-2" name="cantidad3">
            </div>
            <div class="col">
                <label class="form-label">Descripcion</label>
                <input type="text" class="form-control w-75 mb-2" name="descr_ingreso">
                <input type="text" class="form-control w-75 mb-2" name="descr_ingreso1">
                <input type="text" class="form-control w-75 mb-2" name="descr_ingreso2">
                <input type="text" class="form-control w-75 mb-2" name="descr_ingreso3">
            </div>
        </div>

        <select style="display: none;" id="descrr" name="descripcion"></select>
        <select style="display: none;" id="descr22" name="descripcion1"></select>
        <select style="display: none;" id="descr33" name="descripcion2"></select>
        <select style="display: none;" id="descr44" name="descripcion3"></select>

        <input type="text" value="{{$fecha}}" name="fecha" style="display: none;">

        <button type="submit" class="btn btn-primary">Cargar</button>

        <a href="{{url('/listacabeceras')}}"><button type="button" class="btn btn-primary">Cabeceras</button></a>
        <a href="{{url('/reimprimirpdf')}}"><button type="button" class="btn btn-primary">Reimprimir PDF</button></a>

    </form>
</div>

<!-- 
<script>
    var manifiestoonline = document.getElementById("manifiestoOnline");
    var manifiestooffline = document.getElementById("manifiestoOffline");
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
</script> -->
@endsection