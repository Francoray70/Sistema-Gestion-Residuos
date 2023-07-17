@extends('nav')

<style>
    .table {
        background-color: rgb(228, 228, 228);
        font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
    }
</style>

@section('navbar')


<h2 class="mt-3">LISTA DE IMAGENES DE RPG</h2>
<table class="table table-light mt-4 w-85">

    <thead>
        <tr>
            <th>N° DE RPG</th>
            <th>EMPRESA</th>
            <th>IMAGEN</th>
        </tr>
    </thead>

    <tbody>
        @foreach ($img as $datosImg)

        <tr>
            <td>{{$datosImg->numero}}</td>
            <td>{{$datosImg->empresa}}</td>
            <td><a href="{{ route('verimgrpgoalm', ['id' => $datosImg->id]) }}">Ver</a></td>
        </tr>

        @endforeach
    </tbody>

</table>


@endsection