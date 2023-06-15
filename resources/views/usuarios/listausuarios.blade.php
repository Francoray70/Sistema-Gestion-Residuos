@extends('nav')
<style>
    .container {
        background-color: rgb(228, 228, 228);
    }
</style>

@section('navbar')

<div class="container text-center mt-5">
    <h2 class="mb-4">LISTA DE USUARIOS</h2>
    <div class="row">
        <div class="col">
            DNI
        </div>
        <div class="col">
            USUARIO
        </div>
        <div class="col">
            CUIT DE LA EMPRESA
        </div>
        <div class="col">
            EMPRESA
        </div>
        <div class="col">
            CARGO
        </div>
        <div class="col">
            FECHA DE INICIO
        </div>
        <div class="col">
            ULTIMA ACTUALIZACION
        </div>
        <div class="col">
            ROL
        </div>
        <div class="col">
            BANEADO
        </div>
        <div class="col">
            EDITAR
        </div>
    </div>

</div>

@endsection