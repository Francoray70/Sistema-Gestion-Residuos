@extends('nav')

<style>
    .container {
        background-color: rgb(228, 228, 228);
    }
</style>

@section('navbar')

<div class="container w-85 border p-4 mt-5">
    <h2 class="mb-3">CARGAR IMAGENES DE MANIFIESTOS FIRMADOS</h2>
    <form>
        @csrf
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Nº de manifiesto</label>
            <input type="text" class="form-control w-75" id="exampleInputPassword1">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Imagen del manifiesto</label>
            <input class="form-control w-75" type="file" id="formFile">
        </div>

        <button type="submit" class="btn btn-primary">Cargar</button>
    </form>
</div>

@endsection