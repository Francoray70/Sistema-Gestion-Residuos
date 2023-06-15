@extends('nav')

<style>
    .container {
        background-color: rgb(228, 228, 228);
    }
</style>

@section('navbar')


<div class="container w-85 border p-4 mt-5">

    <p>¡Hola nombre!</p>
    <form>
        @csrf
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Autorizacion a empresas</label>
            <select class="form-select w-75" aria-label="Default select example">
                <option selected>Seleccione la empresa</option>
                <option value="1">One</option>
                <option value="2">Two</option>
                <option value="3">Three</option>
            </select>
        </div>
        <div class="mb-3">
            <select class="form-select w-75" aria-label="Default select example">
                <option selected>Seleccione</option>
                <option value="1">Si</option>
                <option value="2">No</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Actualizar</button>
    </form>
</div>


@endsection