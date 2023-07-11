@extends('nav')

<style>
    .container {
        background-color: rgb(228, 228, 228);
    }
</style>

@section('navbar')

<div class="container w-85 border p-4 mt-5">
    <h2 class="mb-3">LIBRO DE MANIFIESTO POR TRANSPORTISTA</h2>
    <form action="{{route('listamanifiestostransporte')}}" method="get">
        <div class="mb-3">
            <label class="form-label">Transporte</label>
            <select class="form-select w-75" name="id_transp" required>
                <option selected>Seleccionar transporte</option>
                @if (!empty($transporte))
                @foreach ($transporte as $datosTransporte)
                <option value="{{$datosTransporte->id_transp}}">{{$datosTransporte->id_transp}}</option>
                @endforeach
                @endif
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label">Fecha de inicio</label>
            <input type="date" name="fecha_inicio" required class="form-control w-75">
        </div>
        <div class="mb-3">
            <label class="form-label">Fecha de final</label>
            <input type="date" name="fecha_fin" required class="form-control w-75">
        </div>

        <button type="submit" class="btn btn-primary">Buscar</button>
    </form>
</div>

@endsection