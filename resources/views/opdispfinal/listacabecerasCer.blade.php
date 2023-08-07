@extends('nav')

<style>
    .table {
        background-color: rgb(228, 228, 228);
        font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
    }
</style>

@section('navbar')

<h2 class="mt-3">LISTA DE CERTIFICADOS CABECERAS</h2>
<table class="table table-light mt-4 w-85">

    <thead>
        <tr>
            <th>SELECCIONAR</th>
            <th>PROV / NAC</th>
            <th>N° CERTIFICADO DF</th>
            <th>OPERADOR DF</th>
            <th>GENERADOR</th>
        </tr>
    </thead>

    <form action="{{route('listaCertificadoDetalle')}}" method="get">
        <tbody>
            @foreach ($resultados as $datosCertificado)
            <tr>
                <td><input type="checkbox" name="id" value="{{$datosCertificado->nro_cert_disp_final}}"></td>
                <td>{{$datosCertificado->provonac}}</td>
                <td>{{$datosCertificado->nro_cert_disp_final}}</td>
                <td>{{$datosCertificado->opdfinal}}</td>
                <td>{{$datosCertificado->generador}}</td>
            </tr>

            @endforeach
        </tbody>

</table>
<button type="submit" class="btn btn-primary ml-3">Buscar detalle</button>
</form>

@endsection