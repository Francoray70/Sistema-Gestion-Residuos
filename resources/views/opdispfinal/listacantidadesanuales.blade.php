@extends('nav')

<style>
    .container {
        background-color: rgb(228, 228, 228);
    }
</style>

@section('navbar')


<h2 class="mt-3">LISTA DE VOLUMENES DE CORRIENTES</h2>
<table class="table table-light mt-4 w-85">

    <thead>
        <tr>
            <th>GENERADOR</th>
            <th>VOLUMEN EN KILOS</th>
            <th>VOLUMEN EN LITROS</th>
        </tr>
    </thead>

    <tbody>
        @foreach ($resultados as $datosCorrientes)
        <tr>
            <td>{{$datosCorrientes->id_oper_df}}</td>
            <td>{{$datosCorrientes->cantidad}}</td>
            <td>{{$datosCorrientes->cantidad}}</td>
        </tr>
        @endforeach
    </tbody>

</table>

<table class="table table-light mt-4 w-85">

    <thead>
        <tr>
            <th>OPERADOR</th>
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
            <td>{{$datosCorrientes->id_oper_df}}</td>
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