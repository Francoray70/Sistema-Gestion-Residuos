@extends('nav')

<style>
    .container {
        background-color: rgb(228, 228, 228);
    }
</style>

@section('navbar')

<div class="container w-85 border p-4 mt-5">
    <h2 class="mb-3">ALTA DE CORRIENTES DE OPERADORAS POR DISPOSICIÓN FINAL</h2>
    <form>
        @csrf
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Operadora de disposicion final</label>
            <select class="form-select w-75" aria-label="Default select example">
                <option selected>Seleccionar operadora</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Corriente de residuo</label>
            <select class="form-select w-75" aria-label="Default select example">
                <option selected>Seleccionar corriente</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Descripcion</label>
            <select class="form-select w-75" aria-label="Default select example">
                <option selected>Seleccione una opción</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Unidad de medida</label>
            <select class="form-select w-75" aria-label="Default select example">
                <option selected>Seleccione una opción</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Estado</label>
            <select class="form-select w-75" aria-label="Default select example">
                <option selected>Seleccione una opción</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Peligrosidad</label>
            <select class="form-select w-75" aria-label="Default select example">
                <option selected>Seleccione una opción</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Cantidad estimada anual</label>
            <input type="text" class="form-control w-75" id="exampleInputPassword1">
        </div>

        <button type="submit" class="btn btn-primary">Cargar</button>
    </form>
</div>

@endsection