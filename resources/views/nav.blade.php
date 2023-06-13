<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            background: rgb(0, 201, 194);
        }
    </style>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js" integrity="sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS" crossorigin="anonymous"></script>
</head>

<body>

    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ url('/') }}">Ray Group</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Generadores
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{url('/generadores')}}">Alta de generadores</a></li>
                            <li><a class="dropdown-item" href="#">Alta de corrientes</a></li>
                            <li><a class="dropdown-item" href="#">Alta de direcciones de retiro</a></li>
                            <li><a class="dropdown-item" href="#">Libro de manifiestos</a></li>
                            <li><a class="dropdown-item" href="#">Listado de generadores</a></li>
                        </ul>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Transportistas
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Alta de transportes</a></li>
                            <li><a class="dropdown-item" href="#">Alta de corrientes</a></li>
                            <li><a class="dropdown-item" href="#">Alta de choferes</a></li>
                            <li><a class="dropdown-item" href="#">Alta de vehiculos </a></li>
                            <li><a class="dropdown-item" href="#">Generar manifiestos</a></li>
                            <li><a class="dropdown-item" href="#">Cargar imagenes de manifiestos</a></li>
                            <li><a class="dropdown-item" href="#">Busqueda por n° de manifiestos</a></li>
                            <li><a class="dropdown-item" href="#">Libro de manifiestos</a></li>
                        </ul>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Operador de almacenamiento
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Alta de operador</a></li>
                            <li><a class="dropdown-item" href="#">Alta de corrientes</a></li>
                            <li><a class="dropdown-item" href="#">Recibir manifiestos</a></li>
                            <li><a class="dropdown-item" href="#">Enviar a diposición final</a></li>
                            <li><a class="dropdown-item" href="#">Generar certificado rpg/osp</a></li>
                            <li><a class="dropdown-item" href="#">Cargar imagene de rpg </a></li>
                            <li><a class="dropdown-item" href="#">Libro de manifiestos</a></li>
                            <li><a class="dropdown-item" href="#">Listado de rpg/osp</a></li>
                        </ul>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Operador de disposición final
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Alta de operador</a></li>
                            <li><a class="dropdown-item" href="#">Alta de corrientes</a></li>
                            <li><a class="dropdown-item" href="#">Recibir manifiestos</a></li>
                            <li><a class="dropdown-item" href="#">Generar certificado de diposición final</a></li>
                            <li><a class="dropdown-item" href="#">Cargar imagen de certificado</a></li>
                            <li><a class="dropdown-item" href="#">Libro de certificados</a></li>
                            <li><a class="dropdown-item" href="#">Libro de manifiestos</a></li>
                        </ul>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Complementos varios
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Alta de actividades</a></li>
                            <li><a class="dropdown-item" href="#">Alta de localidades</a></li>
                            <li><a class="dropdown-item" href="#">Alta de corrientes de residuos</a></li>
                        </ul>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Administración de usuarios
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Alta de empresas</a></li>
                            <li><a class="dropdown-item" href="#">Listado de empresas</a></li>
                            <li><a class="dropdown-item" href="#">Listado de usuarios</a></li>
                        </ul>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#">Cerrar sesión</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    @yield('navbar')


</body>

</html>