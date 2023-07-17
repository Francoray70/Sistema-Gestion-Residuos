@extends('nav')

<style>
    .table {
        background-color: rgb(228, 228, 228);
        font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
    }
</style>

@section('navbar')


<h2 class="mt-3">LISTA DE LOCALIDADES</h2>
<table class="table table-light mt-4 w-85">

    <thead>
        <tr>
            <th>CIUDAD</th>
            <th>CODIGO POSTAL</th>
            <th>PROVINCIA</th>
            <th>EDITAR</th>
        </tr>
    </thead>

    <tbody>
        @foreach ($ciudades as $datosLocalidades)

        <tr>
            <td>{{$datosLocalidades->ciudades}}</td>
            <td>{{$datosLocalidades->cp}}</td>
            <td>{{$datosLocalidades->provincia}}</td>
            <td><a href="{{ route('editarlocalidad', ['id' => $datosLocalidades->id]) }}">Editar</a></td>
        </tr>

        @endforeach
    </tbody>

</table>


@endsection