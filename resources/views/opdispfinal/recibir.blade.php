@extends('nav')

<style>
    .table {
        background-color: rgb(228, 228, 228);
        font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
    }
</style>

@section('navbar')

<h2 class="mt-3">LISTA DE MANIFIESTOS A RECIBIR</h2>
<form action="{{route('autorizarmanifodf')}}" method="get">
    <table class="table table-light mt-4 w-85">

        <thead>
            <tr>
                <th>SELECCIONA</th>
                <th>N° MANIFIESTO</th>
                <th>FECHA</th>
                <th>GENERADOR</th>
                <th>TRANSPORTE</th>
                <th>PATENTE</th>
                <th>OPERADOR</th>
                <th>OBSERVACION</th>
                <th>ESTADO</th>
                <th>AUTORIZAR</th>
                <th>RECHAZAR</th>
            </tr>
        </thead>

        <tbody>

            @if(!empty($datos))
            @foreach ($datos as $datosManifiesto)

            <tr>
                <td><input type="checkbox" name="buscar" value="{{$datosManifiesto->id_manifiesto}}"></td>
                <td>{{$datosManifiesto->id_manifiesto}}</td>
                <td>{{$datosManifiesto->fecha_alta_manif}}</td>
                <td>{{$datosManifiesto->nom_comp}}</td>
                <td>{{$datosManifiesto->id_transp}}</td>
                <td>{{$datosManifiesto->id_patente}}</td>
                <td>{{$datosManifiesto->gener_nom}}</td>
                <td>{{$datosManifiesto->simple_multiple}}</td>
                <td>{{$datosManifiesto->estadoo}}</td>
                <td><input type="checkbox" name="autorizar" value="{{$datosManifiesto->id_manifiesto}}"> </td>
                <td><input type="checkbox" name="rechazar" value="{{$datosManifiesto->id_manifiesto}}"> </td>
            </tr>

            @endforeach
            @endif
        </tbody>


    </table>

    <input type="submit" class="btn btn-primary mt-4 ml-4" value="Actualizar/Buscar">
    <a href=""><button type="button" class="btn btn-primary mt-4 ml-4">Descargar excel</button></a>
</form>
@endsection