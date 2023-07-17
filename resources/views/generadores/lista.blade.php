@extends('nav')

<style>
    .table {
        background-color: rgb(228, 228, 228);
        font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
    }
</style>

@section('navbar')

<h2 class="mt-3">LISTA DE GENERADORES</h2>
<table class="table table-light mt-4 w-85">

    <thead>
        <tr>
            <th>RAZON SOCIAL</th>
            <th>CUIT</th>
            <th>IVA</th>
            <th>DIRECCION</th>
            <th>LOCALIDAD</th>
            <th>CP</th>
            <th>IMG. HAB. PROVINCIA</th>
            <th>VTO. HAB. PROVINCIA</th>
            <th>IMG. HAB. COMERCIAL</th>
            <th>VTO. HAB. COMERCIAL</th>
            <th>HAB. NACIONAL</th>
            <th>ACTUALIZAR IMAGENES</th>
            <th>EDITAR</th>
        </tr>
    </thead>

    <tbody>
        @foreach ($registros as $datosEmpresa)

        <tr>
            <td>{{$datosEmpresa->nom_comp}}</td>
            <td>{{$datosEmpresa->cuit}}</td>
            <td>{{$datosEmpresa->cod_iva}}</td>
            <td>{{$datosEmpresa->direccion}}</td>
            <td>{{$datosEmpresa->ciudad}}</td>
            <td>{{$datosEmpresa->cod_postal}}</td>
            <td><a href="{{ route('verprovincia', ['id' => $datosEmpresa->id]) }}">Ver</a></td>
            <td>{{$datosEmpresa->cli_vto_hab_pro}}</td>
            <td><a href="{{ route('vercomercial', ['id' => $datosEmpresa->id]) }}">Ver</a></td>
            <td>{{$datosEmpresa->cli_vto_hab_com}}</td>
            <td><a href="{{ route('vernacion', ['id' => $datosEmpresa->id]) }}">Ver</a></td>
            <td><a href="{{ route('actualizarimggen', ['id' => $datosEmpresa->id]) }}">Actualizar</a></td>
            <td><a href="{{ route('editargenerador', ['id' => $datosEmpresa->id]) }}">Editar</a></td>
        </tr>

        @endforeach
    </tbody>

</table>

@endsection