@extends('nav')

<style>
    .container {
        background-color: rgb(228, 228, 228);
        font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
    }
</style>

@section('navbar')

<div class="container w-85 border p-4 mt-5">
    <h2 class="mb-3">SELECCIONAR MANIFIESTOS PARA ENVÍO A DISPOSICIÓN FINAL</h2>
    <form action="" method="post">
        @csrf
        <div class="mb-3">
            <label class="form-label">Generador</label>
            <select class="form-select w-75" name="generador">
                <option selected>Seleccione su generador</option>
                @if (!empty($empresas))

                @foreach ($empresas as $datosEmpresas)
                <option value="{{$datosEmpresas->gener_nom}}">{{$datosEmpresas->gener_nom}}</option>
                @endforeach

                @endif
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label">Certifica litros o kilos</label>
            <select class="form-select w-75" name="um">
                <option selected>Seleccione</option>
                <option value="Lts">Litros</option>
                <option value="KGs">Kilogramos</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Buscar</button>
    </form>
</div>

@endsection