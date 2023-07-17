@extends('nav')

<style>
    .container {
        background-color: rgb(228, 228, 228);
        font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
    }
</style>

@section('navbar')

<div class="container w-85 border p-4 mt-5">
    <h2 class="mb-3">BUSCAR MANIFIESTO</h2>
    <form action="{{route('listamanifiestostransporteindividual')}}" method="get">
        <div class="mb-3">
            <label class="form-label">Nº de manifiesto</label>
            <input type="text" name="numero_manifiesto" class="form-control w-75">
        </div>

        <button type="submit" class="btn btn-primary">Buscar</button>
    </form>
</div>

@endsection