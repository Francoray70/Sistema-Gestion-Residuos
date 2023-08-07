@extends('nav')

<style>
    .table {
        background-color: rgb(228, 228, 228);
        font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
    }
</style>

@section('navbar')

<h2 class="mt-3">LISTA DE CERTIFICADOS DETALLES</h2>
<table class="table table-light mt-4 w-85">

    <thead>
        <tr>
            <th>N° CERTIFICADO DF</th>
            <th>CORRIENTE</th>
            <th>UM</th>
            <th>TRANSPORTISTA</th>
            <th>FECHA TRATAMIENTO</th>
            <th>ESTADO</th>
            <th>CANTIDAD</th>
            <th>TIPO DE TRATAMIENTO</th>
            <th>UBICACION</th>
            <th>DESCRIPCION</th>
        </tr>
    </thead>

    <tbody>
        @foreach ($resultados as $datosCertificadoDetalle)
        <tr>
            <td>{{$datosCertificadoDetalle->numero_certif}}</td>
            <td>{{$datosCertificadoDetalle->corriente}}</td>
            <td>{{$datosCertificadoDetalle->um}}</td>
            <td>{{$datosCertificadoDetalle->transportista}}</td>
            <td>{{$datosCertificadoDetalle->fechatratamiento}}</td>
            <td>{{$datosCertificadoDetalle->estado}}</td>
            <td>{{$datosCertificadoDetalle->cantidad}}</td>
            <td>{{$datosCertificadoDetalle->tipotratamiento}}</td>
            <td>{{$datosCertificadoDetalle->ubicacion}}</td>
            <td>{{$datosCertificadoDetalle->descripcion}}</td>
        </tr>

        @endforeach
    </tbody>

</table>
<a href="{{url('/listaCertificadoCabecera')}}"><button type="button" class="btn btn-primary">Cabeceras</button></a>

@endsection