@extends('nav')

<style>
    .container {
        background-color: rgb(228, 228, 228);
        font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
    }
</style>

@section('navbar')

<div class="container w-85 border p-4 mt-5">
    <h2 class="mb-3">LIBRO DE CERTIFICADOS POR OPERADOR</h2>
    <form>
        @csrf
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Operador</label>
            <select class="form-select w-75" aria-label="Default select example">
                <option selected>Seleccionar operadora</option>
                <option value="1">One</option>
                <option value="2">Two</option>
                <option value="3">Three</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Fecha de inicio</label>
            <input type="date" class="form-control w-75" id="exampleInputPassword1">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Fecha de final</label>
            <input type="date" class="form-control w-75" id="exampleInputPassword1">
        </div>

        <button type="submit" class="btn btn-primary">Buscar</button>
    </form>
</div>

@endsection