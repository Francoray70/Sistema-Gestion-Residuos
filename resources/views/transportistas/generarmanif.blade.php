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
                    $("#descr").html(data);
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
                    $("#descr2").html(data);
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
                    $("#descr3").html(data);
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
                    $("#descr4").html(data);
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

<div class="container w-85 border p-4 mt-5">
    <h2 class="mb-3">ALTA DE MANIFIESTOS</h2>
    <form action="" method="post">
        @csrf
        <div class="mb-3">
            <label class="form-label">Generador</label>
            <select class="form-select w-75" name="id_transp" id="generador" required>
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
            <select class="form-select w-75" name="nom_comp" id="transporte" required>
                <option selected>Seleccionar transporte</option>
                @if (!empty($transportes))
                @foreach ($transportes as $datosTransporte)
                <option value="{{$datosTransporte->id_transp}}">{{$datosTransporte->id_transp}}</option>
                @endforeach
                @endif
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label">Operador</label>
            <select class="form-select w-75" name="gener_nom" id="operador" required>
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label">Tipo</label>
            <select class="form-select w-75" name="" id="tipo" required>
            </select>
            <select id="tipo2" name="tipo2" style="display: none"></select>
        </div>
        <div class="mb-3">
            <label class="form-label">Patente</label>
            <select class="form-select w-75" name="id_patente" id="patente" required>
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
                <option value="1">Si</option>
                <option value="2">No</option>
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label">Dermica</label>
            <select class="form-select w-75" name="dermica" required>
                <option selected>Seleccione</option>
                <option value="1">Si</option>
                <option value="2">No</option>
            </select>
        </div>
        <div class="mb-4">
            <label class="form-label">Oral</label>
            <select class="form-select w-75" name="oral" required>
                <option selected>Seleccione</option>
                <option value="1">Si</option>
                <option value="2">No</option>
            </select>
        </div>

        <h5 class="mb-4">SISTEMA DE IDENTIFICACIÓN DE PELIGROSIDAD</h5>


        <div class="mb-3">
            <label class="form-label">Inflamabilidad</label>
            <select class="form-select w-75" name="inflamabilidad" required>
                <option selected>Seleccione</option>
                <option value="1">Si</option>
                <option value="2">No</option>
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label">Toxicidad</label>
            <select class="form-select w-75" name="toxicidad" required>
                <option selected>Seleccione</option>
                <option value="1">Si</option>
                <option value="2">No</option>
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label">Reactividad</label>
            <select class="form-select w-75" name="reactividad" required>
                <option selected>Seleccione</option>
                <option value="1">Si</option>
                <option value="2">No</option>
            </select>
        </div>
        <div class="mb-4">
            <label class="form-label">Instrucciones especiales</label>
            <select class="form-select w-75" name="inst_esp" required>
                <option selected>Seleccione</option>
                <option value="1">Si</option>
                <option value="2">No</option>
            </select>
        </div>



        <h5 class="mb-4">INSTRUCTIVOS</h5>


        <div class="mb-3">
            <label class="form-label">Manipulación en planta trat. o disp. final</label>
            <select class="form-select w-75" name="manipulacion" required>
                <option selected>Seleccione</option>
                <option value="1">Si</option>
                <option value="2">No</option>
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label">Planes de contingencia</label>
            <select class="form-select w-75" name="planes" required>
                <option selected>Seleccione</option>
                <option value="1">Si</option>
                <option value="2">No</option>
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label">Rol de emergencia</label>
            <select class="form-select w-75" name="rol" required>
                <option selected>Seleccione</option>
                <option value="1">Si</option>
                <option value="2">No</option>
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label">Hoja de ruta</label>
            <select class="form-select w-75" name="hoja" required>
                <option selected>Seleccione</option>
                <option value="1">Si</option>
                <option value="2">No</option>
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label">Rutas alternativas</label>
            <select class="form-select w-75" name="rutas" required>
                <option selected>Seleccione</option>
                <option value="1">Si</option>
                <option value="2">No</option>
            </select>
        </div>
        <div class="mb-4">
            <label class="form-label">Direccion de retiro</label>
            <select class="form-select w-75" name="retiro_direc" id="direcciones" required>
            </select>
        </div>


        <h5 class="mb-4">CORRIENTES</h5>

        <div class="row mb-5">
            <div class="col">
                <label class="form-label">Corriente</label>
                <select class="form-select w-75 mb-2" name="id_corrientes" id="corriente" required>
                </select>
                <select class="form-select w-75 mb-2" name="id_corrientes" id="corriente1" required>
                </select>
                <select class="form-select w-75 mb-2" name="id_corrientes" id="corriente2" required>
                </select>
                <select class="form-select w-75 mb-2" name="id_corrientes" id="corriente3" required>
                </select>
            </div>
            <div class="col">
                <label class="form-label">Kgs/Lts</label>
                <select class="form-select w-75 mb-2" name="um" id="kgslts" required>
                </select>
                <select class="form-select w-75 mb-2" name="um" id="kgslts1" required>
                </select>
                <select class="form-select w-75 mb-2" name="um" id="kgslts2" required>
                </select>
                <select class="form-select w-75 mb-2" name="um" id="kgslts3" required>
                </select>
            </div>
            <div class="col">
                <label class="form-label">Estado</label>
                <select class="form-select w-75 mb-2" name="estado" id="estado" required>
                </select>
                <select class="form-select w-75 mb-2" name="estado" id="estado1" required>
                </select>
                <select class="form-select w-75 mb-2" name="estado" id="estado2" required>
                </select>
                <select class="form-select w-75 mb-2" name="estado" id="estado3" required>
                </select>
            </div>
            <div class="col">
                <label class="form-label">Cantidad</label>
                <input type="text" class="form-control w-75 mb-2" name="cantidad" required>
                <input type="text" class="form-control w-75 mb-2" name="cantidad" required>
                <input type="text" class="form-control w-75 mb-2" name="cantidad" required>
                <input type="text" class="form-control w-75 mb-2" name="cantidad" required>
            </div>
            <div class="col">
                <label class="form-label">Descripcion</label>
                <input type="text" class="form-control w-75 mb-2" name="descr_ingreso" required>
                <input type="text" class="form-control w-75 mb-2" name="descr_ingreso" required>
                <input type="text" class="form-control w-75 mb-2" name="descr_ingreso" required>
                <input type="text" class="form-control w-75 mb-2" name="descr_ingreso" required>
            </div>
        </div>

        <select style="display: none" id="descrr" name="descripcion"></select>
        <select style="display: none" id="descr22" name="descripcion"></select>
        <select style="display: none" id="descr33" name="descripcion"></select>
        <select style="display: none" id="descr44" name="descripcion"></select>

        <button type="submit" class="btn btn-primary">Cargar</button>
        <a href="{{url('/listacabeceras')}}"><button type="button" class="btn btn-primary">Cabeceras</button></a>
        <a href="{{url('/listadetalles')}}"><button type="button" class="btn btn-primary">Detalles</button></a>
        <a href="{{url('')}}"><button type="button" class="btn btn-primary">Reimprimir PDF</button></a>
    </form>
</div>

@endsection