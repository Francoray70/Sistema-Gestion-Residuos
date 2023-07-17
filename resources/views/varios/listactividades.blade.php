@extends('nav')

<style>
    .table {
        background-color: rgb(228, 228, 228);
        font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
    }
</style>

@section('navbar')


<h2 class="mt-3">LISTA DE ACTIVIDADES</h2>
<table class="table table-light mt-4 w-85">

    <thead>
        <tr>
            <th>ACTIVIDADES</th>
            <th>EDITAR</th>
        </tr>
    </thead>

    <tbody>
        @foreach ($actividades as $datosActividades)

        <tr>
            <td>{{$datosActividades->actividades}}</td>
            <td><a href="{{ route('editaractividad', ['id' => $datosActividades->id]) }}">Editar</a></td>
        </tr>

        @endforeach
    </tbody>

</table>


@endsection