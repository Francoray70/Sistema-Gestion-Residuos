@extends('nav')

<style>
    .table {
        background-color: rgb(228, 228, 228);
        font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
    }
</style>

@section('navbar')

<h2 class="mt-3">REIMPRIMIR PDF DE MANIFIESTOS</h2>
<table class="table table-light mt-4 w-85">

    <thead>
        <tr>
            <th>🖨</th>
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

    <form action="{{url('/reimprimirelpdf')}}" method="get">
        <tbody>
            @foreach ($manifiesto as $datosManifiesto)
            <tr>
                <td><input type="checkbox" name="id" value="{{$datosManifiesto->id}}"></td>
                <td>{{$datosManifiesto->id_manifiesto}}</td>
                <td>{{$datosManifiesto->id_transp}}</td>
                <td>{{$datosManifiesto->nom_comp}}</td>
                <td>{{$datosManifiesto->fecha_alta_manif}}</td>
                <td>{{$datosManifiesto->id_patente}}</td>
                <td>{{$datosManifiesto->gener_nom}}</td>
                <td>{{$datosManifiesto->simple_multiple}}</td>
                <td>{{$datosManifiesto->estadoo}}</td>
                <td><a href="{{url('/editarmanifiesto/'.$datosManifiesto->id)}}">Editar</a></td>
            </tr>

            @endforeach
        </tbody>

</table>
<button type="submit" class="btn btn-primary ml-3">Imprimir</button>
</form>

@endsection