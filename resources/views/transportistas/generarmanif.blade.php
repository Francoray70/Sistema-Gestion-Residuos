@extends('nav')

<style>
    .container {
        background-color: rgb(228, 228, 228);
    }
</style>

@section('navbar')

<div class="container w-85 border p-4 mt-5">
    <h2 class="mb-3">ALTA DE MANIFIESTOS</h2>
    <form>
        @csrf
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Generador</label>
            <select class="form-select w-75" aria-label="Default select example">
                <option selected>Seleccionar generador</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Transporte</label>
            <select class="form-select w-75" aria-label="Default select example">
                <option selected>Seleccionar transporte</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Operador</label>
            <select class="form-select w-75" aria-label="Default select example">
                <option selected>Seleccione una opción</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Tipo</label>
            <select class="form-select w-75" aria-label="Default select example">
                <option selected>Seleccione una opción</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Patente</label>
            <select class="form-select w-75" aria-label="Default select example">
                <option selected>Seleccione una opción</option>
            </select>
        </div>
        <div class="mb-4">
            <label for="exampleInputPassword1" class="form-label">Chofer</label>
            <select class="form-select w-75" aria-label="Default select example">
                <option selected>Seleccione una opción</option>
            </select>
        </div>


        <h3 class="mb-4">INSTRUCCIONES DE MANIPULACIÓN PARA LOS TRANSPORTISTAS</h3>

        <h5 class="mb-4">COMPONENTES Y CARACTERISTICAS PELIGROSAS</h5>


        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Inhalacion</label>
            <select class="form-select w-75" aria-label="Default select example">
                <option selected>Seleccione</option>
                <option value="1">Si</option>
                <option value="2">No</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Dermica</label>
            <select class="form-select w-75" aria-label="Default select example">
                <option selected>Seleccione</option>
                <option value="1">Si</option>
                <option value="2">No</option>
            </select>
        </div>
        <div class="mb-4">
            <label for="exampleInputEmail1" class="form-label">Oral</label>
            <select class="form-select w-75" aria-label="Default select example">
                <option selected>Seleccione</option>
                <option value="1">Si</option>
                <option value="2">No</option>
            </select>
        </div>

        <h5 class="mb-4">SISTEMA DE IDENTIFICACIÓN DE PELIGROSIDAD</h5>


        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Inflamabilidad</label>
            <select class="form-select w-75" aria-label="Default select example">
                <option selected>Seleccione</option>
                <option value="1">Si</option>
                <option value="2">No</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Toxicidad</label>
            <select class="form-select w-75" aria-label="Default select example">
                <option selected>Seleccione</option>
                <option value="1">Si</option>
                <option value="2">No</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Reactividad</label>
            <select class="form-select w-75" aria-label="Default select example">
                <option selected>Seleccione</option>
                <option value="1">Si</option>
                <option value="2">No</option>
            </select>
        </div>
        <div class="mb-4">
            <label for="exampleInputPassword1" class="form-label">Instrucciones especiales</label>
            <select class="form-select w-75" aria-label="Default select example">
                <option selected>Seleccione</option>
                <option value="1">Si</option>
                <option value="2">No</option>
            </select>
        </div>



        <h5 class="mb-4">INSTRUCTIVOS</h5>


        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Manipulación en planta trat. o disp. final</label>
            <select class="form-select w-75" aria-label="Default select example">
                <option selected>Seleccione</option>
                <option value="1">Si</option>
                <option value="2">No</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="formFile" class="form-label">Planes de contingencia</label>
            <select class="form-select w-75" aria-label="Default select example">
                <option selected>Seleccione</option>
                <option value="1">Si</option>
                <option value="2">No</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Rol de emergencia</label>
            <select class="form-select w-75" aria-label="Default select example">
                <option selected>Seleccione</option>
                <option value="1">Si</option>
                <option value="2">No</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Hoja de ruta</label>
            <select class="form-select w-75" aria-label="Default select example">
                <option selected>Seleccione</option>
                <option value="1">Si</option>
                <option value="2">No</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="formFile" class="form-label">Rutas alternativas</label>
            <select class="form-select w-75" aria-label="Default select example">
                <option selected>Seleccione</option>
                <option value="1">Si</option>
                <option value="2">No</option>
            </select>
        </div>
        <div class="mb-4">
            <label for="exampleInputPassword1" class="form-label">Direccion de retiro</label>
            <select class="form-select w-75" aria-label="Default select example">
                <option selected>Seleccione</option>
            </select>
        </div>


        <h5 class="mb-4">CORRIENTES</h5>

        <div class="row mb-5">
            <div class="col">
                <label for="exampleInputEmail1" class="form-label">Corriente</label>
                <select class="form-select w-75 mb-2" aria-label="Default select example">
                    <option selected>Seleccione</option>
                </select>
                <select class="form-select w-75 mb-2" aria-label="Default select example">
                    <option selected>Seleccione</option>
                </select>
                <select class="form-select w-75 mb-2" aria-label="Default select example">
                    <option selected>Seleccione</option>
                </select>
                <select class="form-select w-75 mb-2" aria-label="Default select example">
                    <option selected>Seleccione</option>
                </select>
            </div>
            <div class="col">
                <label for="exampleInputEmail1" class="form-label">Kgs/Lts</label>
                <select class="form-select w-75 mb-2" aria-label="Default select example">
                    <option selected>Seleccione</option>
                </select>
                <select class="form-select w-75 mb-2" aria-label="Default select example">
                    <option selected>Seleccione</option>
                </select>
                <select class="form-select w-75 mb-2" aria-label="Default select example">
                    <option selected>Seleccione</option>
                </select>
                <select class="form-select w-75 mb-2" aria-label="Default select example">
                    <option selected>Seleccione</option>
                </select>
            </div>
            <div class="col">
                <label for="exampleInputEmail1" class="form-label">Estado</label>
                <select class="form-select w-75 mb-2" aria-label="Default select example">
                    <option selected>Seleccione</option>
                </select>
                <select class="form-select w-75 mb-2" aria-label="Default select example">
                    <option selected>Seleccione</option>
                </select>
                <select class="form-select w-75 mb-2" aria-label="Default select example">
                    <option selected>Seleccione</option>
                </select>
                <select class="form-select w-75 mb-2" aria-label="Default select example">
                    <option selected>Seleccione</option>
                </select>
            </div>
            <div class="col">
                <label for="exampleInputEmail1" class="form-label">Cantidad</label>
                <input type="text" class="form-control w-75 mb-2" id="exampleInputEmail1" aria-describedby="emailHelp">
                <input type="text" class="form-control w-75 mb-2" id="exampleInputEmail1" aria-describedby="emailHelp">
                <input type="text" class="form-control w-75 mb-2" id="exampleInputEmail1" aria-describedby="emailHelp">
                <input type="text" class="form-control w-75 mb-2" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            <div class="col">
                <label for="exampleInputEmail1" class="form-label">Descripcion</label>
                <input type="text" class="form-control w-75 mb-2" id="exampleInputEmail1" aria-describedby="emailHelp">
                <input type="text" class="form-control w-75 mb-2" id="exampleInputEmail1" aria-describedby="emailHelp">
                <input type="text" class="form-control w-75 mb-2" id="exampleInputEmail1" aria-describedby="emailHelp">
                <input type="text" class="form-control w-75 mb-2" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
        </div>


        <button type="submit" class="btn btn-primary">Cargar</button>
    </form>
</div>

@endsection