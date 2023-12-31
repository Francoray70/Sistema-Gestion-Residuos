@extends('nav')

<style>
    .table {
        background-color: rgb(228, 228, 228);
        font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
    }
</style>

@section('navbar')


<h2 class="mt-3">LISTA DE CORRIENTES</h2>
<table class="table table-light mt-4 w-85">

    <thead>
        <tr>
            <th>CORRIENTE</th>
            <th>DESCRIPCIÓN</th>
            <th>UNIDAD DE MEDIDA</th>
            <th>ESTADO</th>
            <th>PELIGROSIDAD</th>
            <th>EDITAR</th>
        </tr>
    </thead>

    <tbody>
        @foreach ($corrientes as $datosCorrientes)

        <tr>
            <td>{{$datosCorrientes->id_corrientes}}</td>
            <td>{{$datosCorrientes->desc_corrientes}}</td>
            <td>{{$datosCorrientes->um}}</td>
            <td>{{$datosCorrientes->estado_cte}}</td>
            <td>{{$datosCorrientes->peligrosidad}}</td>
            <td><a href="{{ route('editarcorrienteprincipal', ['id' => $datosCorrientes->id]) }}">Editar</a></td>
        </tr>

        @endforeach
    </tbody>

</table>


@endsection