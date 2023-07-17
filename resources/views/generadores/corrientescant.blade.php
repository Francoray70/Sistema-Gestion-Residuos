@extends('nav')

<style>
    .container {
        background-color: rgb(228, 228, 228);
        font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
    }
</style>

@section('navbar')

<div class="container w-85 border p-4 mt-5">
    <h2 class="mb-3">BUSCAR CANTIDAD ANUAL POR GENERADOR</h2>
    <form action="{{route('cantidadesanuales')}}" method="get">
        <div class="mb-3">
            <label class="form-label">Generador</label>
            <select class="form-select w-75" name="nom_comp" required>
                <option selected>Seleccionar generador</option>
                @if (!empty($generador))
                @foreach ($generador as $datosGenerador)
                <option value="{{$datosGenerador->nom_comp}}">{{$datosGenerador->nom_comp}}</option>
                @endforeach
                @endif
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Buscar</button>
    </form>
</div>

@endsection