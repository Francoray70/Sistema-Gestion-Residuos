@extends('nav')

<style>
    .container {
        background-color: rgb(228, 228, 228);
    }
</style>

@section('navbar')

<h2 class="mt-3">LISTA DE MANIFIESTOS</h2>
<table class="table table-light mt-4 w-85">

    <thead>
        <tr>
            <th>SELECCIONAR</th>
            <th>N° MANIFIESTO</th>
            <th>TRANSPORTE</th>
            <th>GENERADOR</th>
            <th>FECHA MANIFIESTOS</th>
            <th>DOMINIO</th>
            <th>OPERADOR</th>
            <th>OBSERVACIÓN</th>
            <th>ESTADO</th>
            <th>EDITAR</th>
        </tr>
    </thead>

    <tbody>
        @foreach ($manifiesto as $datosManifiesto)

        <tr>
            <td><a href="">Seleccionar</a></td>
            <td>{{$datosManifiesto->id_manifiesto}}</td>
            <td>{{$datosManifiesto->id_transp}}</td>
            <td>{{$datosManifiesto->nom_comp}}</td>
            <td>{{$datosManifiesto->fecha_alta_manif}}</td>
            <td>{{$datosManifiesto->id_patente}}</td>
            <td>{{$datosManifiesto->gener_nom}}</td>
            <td>{{$datosManifiesto->simple_multiple}}</td>
            <td>{{$datosManifiesto->estadoo}}</td>
            <td><a href="">Editar</a></td>
        </tr>

        @endforeach
    </tbody>

</table>

@endsection