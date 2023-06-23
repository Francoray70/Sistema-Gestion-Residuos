@extends('nav')

<style>
    .container {
        background-color: rgb(228, 228, 228);
    }
</style>

@section('navbar')

<div class="container w-85 border p-4 mt-5">
    <h2 class="mb-3">ALTA DE LOCALIDADES</h2>
    <form>
        @csrf
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Provincia</label>
            <select class="form-select w-75" aria-label="Default select example">
                <option selected>Seleccione su provincia</option>
                <option value="1">Kilogramos</option>
                <option value="2">Litros</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Ciudad</label>
            <input type="text" class="form-control w-75" id="exampleInputPassword1">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Codigo postal</label>
            <input type="text" class="form-control w-75" id="exampleInputPassword1">
        </div>

        <button type="submit" class="btn btn-primary">Cargar</button>
        <a href="{{url('/listalocalidades')}}">
            <button type="button" class="btn btn-primary">Listado</button>
        </a>
    </form>
</div>

@endsection