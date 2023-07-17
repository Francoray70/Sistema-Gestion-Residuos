@extends('nav')

<style>
    .container {
        background-color: rgb(228, 228, 228);
        font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
    }
</style>

@section('navbar')

<div class="container w-85 border p-4 mt-5">
    <h2 class="mb-3">RECIBIR MANIFIESTOS</h2>
    <form>
        @csrf
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Generador</label>
            <select class="form-select w-75" aria-label="Default select example">
                <option selected>Seleccione una opción</option>
                <option value="1">One</option>
                <option value="2">Two</option>
                <option value="3">Three</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Cuit</label>
            <input type="password" class="form-control w-75" id="exampleInputPassword1">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Tipo de IVA</label>
            <select class="form-select w-75" aria-label="Default select example">
                <option selected>Seleccione una opción</option>
                <option value="1">Responsable inscripto</option>
                <option value="2">Monotributo</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Dirección</label>
            <input type="text" class="form-control w-75" id="exampleInputPassword1">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Provincia</label>
            <select class="form-select w-75" aria-label="Default select example">
                <option selected>Seleccione una opción</option>
                <option value="1">One</option>
                <option value="2">Two</option>
                <option value="3">Three</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Ciudad</label>
            <select class="form-select w-75" aria-label="Default select example">
                <option selected>Seleccione una opción</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">CP</label>
            <select class="form-select w-75" aria-label="Default select example">
                <option selected>Seleccione una opción</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Nombre</label>
            <input type="text" class="form-control w-75" id="exampleInputPassword1">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Apellido</label>
            <input type="text" class="form-control w-75" id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Actividad</label>
            <select class="form-select w-75" aria-label="Default select example">
                <option selected>Seleccione una opción</option>
                <option value="1">One</option>
                <option value="2">Two</option>
                <option value="3">Three</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Telefono</label>
            <input type="text" class="form-control w-75" id="exampleInputPassword1">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Celular</label>
            <input type="text" class="form-control w-75" id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Habilitación provincial n°:</label>
            <input type="text" class="form-control w-75" id="exampleInputPassword1">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Habilitación provincial vto:</label>
            <input type="email" class="form-control w-75" id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label for="formFile" class="form-label">Habilitación provincial:</label>
            <input class="form-control w-75" type="file" id="formFile">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Habilitación nacional n°:</label>
            <input type="text" class="form-control w-75" id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Habilitación nacional vto:</label>
            <input type="password" class="form-control w-75" id="exampleInputPassword1">
        </div>
        <div class="mb-3">
            <label for="formFile" class="form-label">Habilitación nacional:</label>
            <input class="form-control w-75" type="file" id="formFile">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Habilitación comercial n°:</label>
            <input type="text" class="form-control w-75" id="exampleInputPassword1">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Habilitación comercial vto:</label>
            <input type="email" class="form-control w-75" id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label for="formFile" class="form-label">Habilitación comercial:</label>
            <input class="form-control w-75" type="file" id="formFile">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Email</label>
            <input type="email" class="form-control w-75" id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>
        <button type="submit" class="btn btn-primary">Cargar</button>
    </form>
</div>

@endsection