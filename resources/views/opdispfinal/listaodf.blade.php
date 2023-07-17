@extends('nav')

<style>
    .table {
        background-color: rgb(228, 228, 228);
        font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
    }
</style>

@section('navbar')

<h2 class="mt-3">LISTA DE OPERADORES</h2>
<table class="table table-light mt-4 w-85">

    <thead>
        <tr>
            <th>OPERADOR</th>
            <th>CUIT EMPRESAS OPERADORAS</th>
            <th>DIRECCIÓN</th>
            <th>LOCALIDAD</th>
            <th>PROVINCIA</th>
            <th>UBI. PLANTA TRATAMIENTO</th>
            <th>IMG. HAB. PROV.</th>
            <th>VTO. HAB. PROV.</th>
            <th>IMG. HAB. NAC</th>
            <th>VTO. HAB. NAC.</th>
            <th>IMG. HAB. MUN.</th>
            <th>VTO. HAB. MUNICIPAL</th>
            <th>ACTUALIZAR IMAGENES</th>
            <th>EDITAR</th>
        </tr>
    </thead>

    <tbody>
        @foreach ($operadores as $datosOperador)

        <tr>
            <td>{{$datosOperador->id_operador_df }}</td>
            <td>{{$datosOperador->cuit_odf}}</td>
            <td>{{$datosOperador->direc_odf}}</td>
            <td>{{$datosOperador->local_odf}}</td>
            <td>{{$datosOperador->prov_odf}}</td>
            <td>{{$datosOperador->ubi_odf}}</td>
            <td><a href="{{ route('verprovinciaodf', ['id' => $datosOperador->id]) }}">Ver</a></td>
            <td>{{$datosOperador->hab_pro_vto_odf}}</td>
            <td><a href="{{ route('vernacionodf', ['id' => $datosOperador->id]) }}">Ver</a></td>
            <td>{{$datosOperador->vto_hab_nac}}</td>
            <td><a href="{{ route('vermunicipalodf', ['id' => $datosOperador->id]) }}">Ver</a></td>
            <td>{{$datosOperador->hab_mun_vto_odf}}</td>
            <td><a href="{{ route('actualizarimgodf', ['id' => $datosOperador->id]) }}">Actualizar</a></td>
            <td><a href="{{ route('editarodf', ['id' => $datosOperador->id]) }}">Editar</a></td>
        </tr>

        @endforeach
    </tbody>

</table>

@endsection