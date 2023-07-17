@extends('nav')

<style>
    .table {
        background-color: rgb(228, 228, 228);
        font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
    }
</style>

@section('navbar')


<h2 class="mt-3">LISTA DE CORRIENTES DE OPERADORAS</h2>
<table class="table table-light mt-4 w-85">

    <thead>
        <tr>
            <th>OPERADORA</th>
            <th>CORRIENTE</th>
            <th>DESCRIPCIÓN</th>
            <th>UNIDAD DE MEDIDA</th>
            <th>ESTADO</th>
            <th>PELIGROSIDAD</th>
            <th>CANTIDAD ANUAL</th>
            <th>EDITAR</th>
            <th>ELIMINAR</th>
        </tr>
    </thead>

    <tbody>
        @foreach ($corrientes as $datosCorrientes)

        <tr>
            <td>{{$datosCorrientes->id_oper_df}}</td>
            <td>{{$datosCorrientes->id_corrientes}}</td>
            <td>{{$datosCorrientes->descripcion}}</td>
            <td>{{$datosCorrientes->um}}</td>
            <td>{{$datosCorrientes->estado}}</td>
            <td>{{$datosCorrientes->peligrosidad}}</td>
            <td>{{$datosCorrientes->cantidad}}</td>
            <td><a href="{{ route('editarcorrienteodf', ['id' => $datosCorrientes->id]) }}">Editar</a></td>
            <td>
                <form action="{{url('/corrientesopdispfinal/'.$datosCorrientes->id)}}" method="post">
                    {{ @method_field('DELETE') }}
                    @csrf
                    <button type="submit" class="btn btn-primary p-0">Eliminar</button>
                </form>
            </td>
        </tr>

        @endforeach
    </tbody>

</table>


@endsection