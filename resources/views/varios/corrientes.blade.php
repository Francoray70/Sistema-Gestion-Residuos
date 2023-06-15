@extends('nav')

<style>
    .container {
        background-color: rgb(228, 228, 228);
    }
</style>

@section('navbar')

<div class="container w-85 border p-4 mt-5">
    <h2 class="mb-3">ALTA DE CORRIENTES DE RESIDUOS</h2>
    <form>
        @csrf
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Corriente</label>
            <input type="password" class="form-control w-75" id="exampleInputPassword1">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Descripcion</label>
            <input type="text" class="form-control w-75" id="exampleInputPassword1">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Unidad de medida</label>
            <select class="form-select w-75" aria-label="Default select example">
                <option selected>Seleccione la unidad</option>
                <option value="1">Kilogramos</option>
                <option value="2">Litros</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Estado</label>
            <select class="form-select w-75" aria-label="Default select example">
                <option selected>Seleccione el estado</option>
                <option value="1">Solido</option>
                <option value="2">Liquido</option>
                <option value="3">Semi solido</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Peligrosidad</label>
            <input type="text" class="form-control w-75" id="exampleInputPassword1">
        </div>

        <button type="submit" class="btn btn-primary">Cargar</button>
    </form>
</div>

@endsection