@extends('nav')

<style>
    .container {
        background-color: rgb(228, 228, 228);
    }
</style>

@section('navbar')


<div class="container w-85 border p-4 mt-5">
    <h2 class="mb-3">ALTA DE VEHÍCULOS</h2>
    <form>
        @csrf
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Patente</label>
            <input type="text" class="form-control w-75" id="exampleInputPassword1">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Transporte</label>
            <select class="form-select w-75" aria-label="Default select example">
                <option selected>Seleccione su transporte</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Vehiculo</label>
            <input type="text" class="form-control w-75" id="exampleInputPassword1">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Tipo de vehiculo</label>
            <input class="form-control w-75" type="file" id="formFile">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Vencimiento de ruta</label>
            <input type="date" class="form-control w-75" id="exampleInputPassword1">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Imagen de ruta</label>
            <input class="form-control w-75" type="file" id="formFile">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Titulo de propiedad</label>
            <input class="form-control w-75" type="file" id="formFile">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Cedula verde</label>
            <input class="form-control w-75" type="file" id="formFile">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Vencimiento de la V.T.V.</label>
            <input type="date" class="form-control w-75" id="exampleInputPassword1">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Imagen de la V.T.V.</label>
            <input class="form-control w-75" type="file" id="formFile">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Nº de registro de la carga peligrosa</label>
            <input type="text" class="form-control w-75" id="exampleInputPassword1">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Imagen de la carga peligrosa</label>
            <input class="form-control w-75" type="file" id="formFile">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Vencimiento de la carga peligrosa</label>
            <input type="date" class="form-control w-75" id="exampleInputPassword1">
        </div>


        <button type="submit" class="btn btn-primary">Cargar</button>
    </form>
</div>

@endsection