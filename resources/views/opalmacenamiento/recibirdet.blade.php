@extends('nav')

<style>
    .table {
        background-color: rgb(228, 228, 228);
        font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
    }
</style>

@section('navbar')

<h2 class="mt-3">LISTA DE DETALLES DE MANIFIESTOS A RECIBIR</h2>
<table class="table table-light mt-4 w-85">

    <thead>
        <tr>
            <th>N° MANIFIESTO</th>
            <th>TRANSPORTE</th>
            <th>CORRIENTE</th>
            <th>UM</th>
            <th>ESTADO</th>
            <th>CANTIDAD</th>
            <th>DESCRIPCION</th>
            <th>TIPO</th>
            <th>ESTADO</th>
            <th>EDITAR</th>
        </tr>
    </thead>

    <tbody>

        @if(!empty($datos))
        @foreach ($datos as $datosManifiestoDetalles)

        <tr>
            <td>{{$datosManifiestoDetalles->id_manifies}}</td>
            <td>{{$datosManifiestoDetalles->id_transpo}}</td>
            <td>{{$datosManifiestoDetalles->id_corrientes}}</td>
            <td>{{$datosManifiestoDetalles->um}}</td>
            <td>{{$datosManifiestoDetalles->estado}}</td>
            <td>{{$datosManifiestoDetalles->cantidad}}</td>
            <td>{{$datosManifiestoDetalles->descr_ingreso}}</td>
            <td>{{$datosManifiestoDetalles->simp_multi}}</td>
            <td>{{$datosManifiestoDetalles->estadooo}}</td>
            <td><a href="{{url('/editarmanifiestodetallepararecibir/'.$datosManifiestoDetalles->id)}}">Editar</a></td>
        </tr>
        @endforeach
        @endif
    </tbody>


</table>

@endsection