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
            <th>N° MANIFIESTO</th>
            <th>TRANSPORTE</th>
            <th>CORRIENTE</th>
            <th>UM</th>
            <th>ESTADO</th>
            <th>CANTIDAD</th>
            <th>DESCRIPCIÓN</th>
            <th>TIPO</th>
            <th>ESTADO</th>
            <th>AGREGAR DETALLE</th>
            <th>EDITAR</th>
        </tr>
    </thead>

    <tbody>
        @foreach ($manifiesto as $datosManifiesto)

        <tr>
            <td>{{$datosManifiesto->id_manifies}}</td>
            <td>{{$datosManifiesto->id_transpo}}</td>
            <td>{{$datosManifiesto->id_corrientes}}</td>
            <td>{{$datosManifiesto->um}}</td>
            <td>{{$datosManifiesto->estado}}</td>
            <td>{{$datosManifiesto->cantidad}}</td>
            <td>{{$datosManifiesto->descripcion}}</td>
            <td>{{$datosManifiesto->simp_multi}}</td>
            <td>{{$datosManifiesto->estadooo}}</td>
            <td><a href="">Agregar</a></td>
            <td><a href="">Editar</a></td>
        </tr>

        @endforeach
    </tbody>

</table>

@endsection