<?php

?>

@extends('nav')

<style>
    .container {
        background-color: rgb(228, 228, 228);
    }
</style>

@section('navbar')

<div class="container w-85 border p-4 mt-5">
    <h2 class="mb-3">ALTA DE OPERADOR DE DISPOSICIÓN FINAL</h2>
    <form action="{{url('/')}}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Operador de disposición final</label>
            <select class="form-select w-75" aria-label="Default select example">
                <option selected>Seleccione su empresa</option>
                <option value="1">One</option>
                <option value="2">Two</option>
                <option value="3">Three</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Direccion</label>
            <input type="text" class="form-control w-75" id="exampleInputPassword1">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">CUIT</label>
            <select class="form-select w-75" aria-label="Default select example">
                <option selected>Seleccione </option>
            </select>
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Provincia</label>
            <select class="form-select w-75" aria-label="Default select example">
                <option selected>Seleccione su provincia</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Ciudad</label>
            <select class="form-select w-75" aria-label="Default select example">
                <option selected>Seleccione una opción</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Codigo postal</label>
            <select class="form-select w-75" aria-label="Default select example">
                <option selected>Seleccione una opción</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Telefono</label>
            <input type="text" class="form-control w-75" id="exampleInputPassword1">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Ubicacion tratamiento</label>
            <input type="text" class="form-control w-75" id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Email</label>
            <input type="email" class="form-control w-75" id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">CDF inicial</label>
            <input type="number" class="form-control w-75" id="exampleInputPassword1">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">CDF final</label>
            <input type="number" class="form-control w-75" id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">CDF actual</label>
            <input type="number" class="form-control w-75" id="exampleInputPassword1">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Habilitación municipal nº</label>
            <input type="text" class="form-control w-75" id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Habilitación municipal vto</label>
            <input type="date" class="form-control w-75" id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label for="formFile" class="form-label">Habilitación municipal</label>
            <input class="form-control w-75" type="file" id="formFile">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Habilitación provincial n°</label>
            <input type="text" class="form-control w-75" id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Habilitación provincial vto</label>
            <input type="date" class="form-control w-75" id="exampleInputPassword1">
        </div>
        <div class="mb-3">
            <label for="formFile" class="form-label">Habilitación provincial</label>
            <input class="form-control w-75" type="file" id="formFile">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Habilitación nacional n°</label>
            <input type="text" class="form-control w-75" id="exampleInputPassword1">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Habilitación nacional vto</label>
            <input type="date" class="form-control w-75" id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label for="formFile" class="form-label">Habilitación nacional</label>
            <input class="form-control w-75" type="file" id="formFile">
        </div>


        <button type="submit" class="btn btn-primary">Cargar</button>
        <a href="{{url('/listacorrientes')}}">
            <button type="button" class="btn btn-primary">Listado</button>
        </a>
    </form>
</div>

@endsection