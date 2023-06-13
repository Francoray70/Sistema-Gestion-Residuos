@extends('nav')

<style>
    body {
        background-color: rgb(0, 201, 194);
    }
</style>

@section('navbar')

<div class="container w-85 border p-4 mt-5">
    <form>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Generador</label>
            <input type="email" class="form-control w-50" id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Cuit</label>
            <input type="password" class="form-control w-50" id="exampleInputPassword1">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Tipo de IVA</label>
            <input type="email" class="form-control w-50" id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Dirección</label>
            <input type="password" class="form-control w-50" id="exampleInputPassword1">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Provincia</label>
            <input type="email" class="form-control w-50" id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Ciudad</label>
            <input type="password" class="form-control w-50" id="exampleInputPassword1">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">CP</label>
            <input type="email" class="form-control w-50" id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Nombre</label>
            <input type="password" class="form-control w-50" id="exampleInputPassword1">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Apellido</label>
            <input type="email" class="form-control w-50" id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Actividad</label>
            <input type="email" class="form-control w-50" id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Telefono</label>
            <input type="password" class="form-control w-50" id="exampleInputPassword1">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Celular</label>
            <input type="email" class="form-control w-50" id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Habilitación provincial n°:</label>
            <input type="password" class="form-control w-50" id="exampleInputPassword1">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Habilitación provincial vto:</label>
            <input type="email" class="form-control w-50" id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Habilitación provincial:</label>
            <input type="password" class="form-control w-50" id="exampleInputPassword1">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Habilitación nacional n°:</label>
            <input type="email" class="form-control w-50" id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Habilitación nacional vto:</label>
            <input type="password" class="form-control w-50" id="exampleInputPassword1">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Habilitación nacional:</label>
            <input type="email" class="form-control w-50" id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Habilitación comercial n°:</label>
            <input type="password" class="form-control w-50" id="exampleInputPassword1">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Habilitación comercial vto:</label>
            <input type="email" class="form-control w-50" id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Habilitación comercial:</label>
            <input type="password" class="form-control w-50" id="exampleInputPassword1">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Email</label>
            <input type="email" class="form-control w-50" id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>
        <button type="submit" class="btn btn-primary">Cargar</button>
    </form>
</div>

@endsection