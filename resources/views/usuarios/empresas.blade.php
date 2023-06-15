@extends('nav')

<style>
    .container {
        background-color: rgb(228, 228, 228);
    }
</style>

@section('navbar')

<div class="container w-85 border p-4 mt-5">
    <h2 class="mb-3">ALTA DE EMPRESA</h2>
    <form action="{{ url('/empresas') }}" method="post">
        @csrf
        <div class="mb-3">
            <label for="nombreEmpresa" class="form-label">Nombre de la empresa</label>
            <input type="text" name="nombre" required class="form-control w-75" id="nombreEmpresa">
        </div>
        <div class="mb-3">
            <label for="cuitEmpresa" class="form-label">CUIT</label>
            <input type="text" name="cuit" required class="form-control w-75" id="cuitEmpresa" placeholder="Nª de CUIT">
        </div>
        <div class="mb-3">
            <label for="categoriaEmpresa" class="form-label">Categoria</label>
            <select name="categoria" required class="form-select w-75" aria-label="categoriaEmpresa">
                <option selected>Seleccione</option>
                <option value="1">Generador</option>
                <option value="2">Transportista</option>
                <option value="3">Operador por almacenamiento</option>
                <option value="4">Operador por disposicion final</option>
                <option value="5">Ente fiscal</option>
                <option value="6">Administrador</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="provinciaEmpresa" class="form-label">Provincia</label>
            <select name="provincia" required class="form-select w-75" aria-label="provinciaEmpresa">
                <option selected>Seleccione su provincia</option>
                <option value="buenos aires">Buenos Aires</option>
            </select>
        </div>

        <button type="submit" value="enviar" class="btn btn-primary">Cargar</button>
    </form>
</div>

@endsection