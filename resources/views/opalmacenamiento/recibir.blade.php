@extends('nav')

<style>
    .table {
        background-color: rgb(228, 228, 228);
        font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
    }
</style>

@section('navbar')

<h2 class="mt-3">LISTA DE MANIFIESTOS A RECIBIR</h2>
<table class="table table-light mt-4 w-85">

    <thead>
        <tr>
            <th>N° MANIFIESTO</th>
            <th>FECHA MANIFIESTO</th>
            <th>TRANSPORTE</th>
            <th>GENERADOR</th>
            <th>DOMINIO</th>
            <th>OPERADOR</th>
            <th>OBSERVACION</th>
            <th>ESTADO</th>
            <th>AUTORIZAR</th>
            <th>RECHAZAR</th>
        </tr>
    </thead>

    <tbody>
        @foreach ($resultados as $datosManifiestoCabecera)

        <tr>
            <td>{{$datosManifiestoCabecera->id_manifiesto}}</td>
            <td>{{$datosManifiestoCabecera->fecha_alta_manif}}</td>
            <td>{{$datosManifiestoCabecera->id_transp}}</td>
            <td>{{$datosManifiestoCabecera->nom_comp}}</td>
            <td>{{$datosManifiestoCabecera->id_patente}}</td>
            <td>{{$datosManifiestoCabecera->gener_nom}}</td>
            <td>{{$datosManifiestoCabecera->simple_multiple}}</td>
            <td>{{$datosManifiestoCabecera->estadoo}}</td>
            <td>{{$datosManifiestoCabecera->id_manifiesto}}</td>
            <td>{{$datosManifiestoCabecera->id_manifiesto}}</td>

        </tr>

        @endforeach
    </tbody>


</table>
<a href=""><button type="button" class="btn btn-primary mt-4 ml-4">ACTUALIZAR</button></a>
<a href=""><button type="button" class="btn btn-primary mt-4 ml-4">DETALLES</button></a>
@endsection