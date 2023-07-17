@extends('nav')

<style>
    .table {
        background-color: rgb(228, 228, 228);
        font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
    }
</style>

@section('navbar')


<h2 class="mt-3">LISTA DE VOLUMENES DE CORRIENTES</h2>
<table class="table table-light mt-4 w-85">

    <thead>
        <tr>
            <th>GENERADOR</th>
            <th>VOLUMEN EN LITROS</th>
            <th>VOLUMEN EN KILOS</th>
        </tr>
    </thead>

    <tbody>
        <tr>
            <td>{{$generador}}</td>
            <td>{{$resultadosSumadoLt}}</td>
            <td>{{$resultadosSumadoKg}}</td>
        </tr>
    </tbody>

</table>

<table class="table table-light mt-4 w-85">

    <thead>
        <tr>
            <th>GENERADOR</th>
            <th>CORRIENTE</th>
            <th>DESCRIPCIÓN</th>
            <th>UM</th>
            <th>ESTADO</th>
            <th>PELIGROSIDAD</th>
            <th>CANTIDAD ANUAL</th>
        </tr>
    </thead>

    <tbody>
        @foreach ($resultados as $datosCorrientes)

        <tr>
            <td>{{$datosCorrientes->generador}}</td>
            <td>{{$datosCorrientes->id_corrientes}}</td>
            <td>{{$datosCorrientes->descripcion}}</td>
            <td>{{$datosCorrientes->um}}</td>
            <td>{{$datosCorrientes->estado}}</td>
            <td>{{$datosCorrientes->peligrosidad}}</td>
            <td>{{$datosCorrientes->cantidad}}</td>
        </tr>

        @endforeach
    </tbody>

</table>
@endsection