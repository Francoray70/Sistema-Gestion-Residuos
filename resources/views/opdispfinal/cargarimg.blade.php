@extends('nav')

<style>
    .container {
        background-color: rgb(228, 228, 228);
        font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
    }
</style>

@section('navbar')

<div class="container w-85 border p-4 mt-5">
    <h2 class="mb-3">CARGAR IMAGENES DE MANIFIESTOS FIRMADOS</h2>
    <form>
        @csrf
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Numero de certificado</label>
            <input type="text" class="form-control w-75" id="exampleInputPassword1">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Certificado</label>
            <input class="form-control w-75" type="file" id="formFile">
        </div>

        <button type="submit" class="btn btn-primary">Cargar</button>
    </form>
</div>

@endsection