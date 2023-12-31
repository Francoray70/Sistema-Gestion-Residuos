<?php

use Illuminate\Support\Facades\Auth;

$user = Auth::user();
$userNombre = $user->nombre;
$userApellido = $user->apellido;
$userEmpresa = $user->empresa;
$userRol = $user->rol_id;
?>

<!DOCTYPE html>

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Gestion de residuos</title>

    <link rel="shortcat icon" href="{{asset('img/logo.ico')}}">


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <link rel="shortcat icon" href="{{asset('img/logo.ico')}}">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js" integrity="sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS" crossorigin="anonymous"></script>
    <!-- Scripts -->
    @vite(['resources/sass/app.css', 'resources/js/app.js'])

    <style>
        /* Estilo personalizado para el fondo blanco */
        .custom-toggler {
            background-color: grey;
            font-size: 15px;
            font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
            color: white;
            /* Puedes ajustar los bordes según tus preferencias */
            /* Otros estilos que desees aplicar */
        }

        /* Estilo personalizado para que las líneas de la hamburguesa sean negras */
        .custom-icon {
            background-color: white;
            border-radius: 50%;
            /* Cambia el color de fondo de las líneas */
            /* Otros estilos que desees aplicar a las líneas de la hamburguesa */
        }
    </style>

</head>


<body>

    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{url('/inicio')}}">
                <img src="{{asset('img/logo.png')}}" alt="Ray Group" width="70" height="40">
            </a>
            <button class="navbar-toggler custom-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                MENU <span class="navbar-toggler-icon custom-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">

                    @if ($userRol == '1')
                    <li class="nav-item dropdown" id="rol1">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Generadores
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{url('/generadores')}}">Alta de generadores</a></li>
                            <li><a class="dropdown-item" href="{{url('/corrientesgenerador')}}">Alta de corrientes</a></li>
                            <li><a class="dropdown-item" href="{{url('/direccionesgenerador')}}">Alta de direcciones de retiro</a></li>
                            <li><a class="dropdown-item" href="{{url('/manifiestosgenerador')}}">Libro de manifiestos</a></li>
                            <li><a class="dropdown-item" href="{{url('/listagenerador')}}">Listado de generadores</a></li>
                        </ul>
                    </li>
                    @elseif($userRol == '2')
                    <li class="nav-item dropdown" id="rol1">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Generadores
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{url('/generadores')}}">Alta de generadores</a></li>
                            <li><a class="dropdown-item" href="{{url('/corrientesgenerador')}}">Alta de corrientes</a></li>
                            <li><a class="dropdown-item" href="{{url('/direccionesgenerador')}}">Alta de direcciones de retiro</a></li>
                            <li><a class="dropdown-item" href="{{url('/manifiestosgenerador')}}">Libro de manifiestos</a></li>
                            <li><a class="dropdown-item" href="{{url('/listagenerador')}}">Listado de generadores</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown" id="rol2">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Transportistas
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{url('/transportistas')}}">Alta de transportes</a></li>
                            <li><a class="dropdown-item" href="{{url('/corrientestransporte')}}">Alta de corrientes</a></li>
                            <li><a class="dropdown-item" href="{{url('/choferes')}}">Alta de choferes</a></li>
                            <li><a class="dropdown-item" href="{{url('/vehiculos')}}">Alta de vehiculos </a></li>
                            <li><a class="dropdown-item" href="{{url('/generarmanifiesto')}}">Generar manifiestos</a></li>
                            <li><a class="dropdown-item" href="{{url('/imagenesmanifiestostr')}}">Cargar imagenes de manifiestos</a></li>
                            <li><a class="dropdown-item" href="{{url('/buscarmanifiestos')}}">Busqueda por n° de manifiestos</a></li>
                            <li><a class="dropdown-item" href="{{url('/libromanifiestos')}}">Libro de manifiestos</a></li>
                        </ul>
                    </li>

                    @elseif($userRol == '3')
                    <li class="nav-item dropdown" id="rol1">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Generadores
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{url('/generadores')}}">Alta de generadores</a></li>
                            <li><a class="dropdown-item" href="{{url('/corrientesgenerador')}}">Alta de corrientes</a></li>
                            <li><a class="dropdown-item" href="{{url('/direccionesgenerador')}}">Alta de direcciones de retiro</a></li>
                            <li><a class="dropdown-item" href="{{url('/manifiestosgenerador')}}">Libro de manifiestos</a></li>
                            <li><a class="dropdown-item" href="{{url('/listagenerador')}}">Listado de generadores</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown" id="rol2">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Transportistas
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{url('/transportistas')}}">Alta de transportes</a></li>
                            <li><a class="dropdown-item" href="{{url('/corrientestransporte')}}">Alta de corrientes</a></li>
                            <li><a class="dropdown-item" href="{{url('/choferes')}}">Alta de choferes</a></li>
                            <li><a class="dropdown-item" href="{{url('/vehiculos')}}">Alta de vehiculos </a></li>
                            <li><a class="dropdown-item" href="{{url('/generarmanifiesto')}}">Generar manifiestos</a></li>
                            <li><a class="dropdown-item" href="{{url('/imagenesmanifiestostr')}}">Cargar imagenes de manifiestos</a></li>
                            <li><a class="dropdown-item" href="{{url('/buscarmanifiestos')}}">Busqueda por n° de manifiestos</a></li>
                            <li><a class="dropdown-item" href="{{url('/libromanifiestos')}}">Libro de manifiestos</a></li>
                        </ul>
                    </li>

                    <li class="nav-item dropdown" id="rol3">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Operador de almacenamiento
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{url('/opalmacenamiento')}}">Alta de operador</a></li>
                            <li><a class="dropdown-item" href="{{url('/corrientesopalmacenamiento')}}">Alta de corrientes</a></li>
                            <li><a class="dropdown-item" href="{{url('/recibirmanifiestoalm')}}">Recibir manifiestos</a></li>
                            <li><a class="dropdown-item" href="{{url('/enviarmanifiestoalm')}}">Enviar a diposición final</a></li>
                            <li><a class="dropdown-item" href="{{url('/generarcertifrpg')}}">Generar certificado rpg/osp</a></li>
                            <li><a class="dropdown-item" href="{{url('/cargarimgrpg')}}">Cargar imagenes de rpg </a></li>
                            <li><a class="dropdown-item" href="{{url('/libromanifiestosopalm')}}">Libro de manifiestos</a></li>
                            <li><a class="dropdown-item" href="{{url('/librorpgalm')}}">Listado de rpg/osp</a></li>
                        </ul>
                    </li>
                    @elseif($userRol == '4')
                    <li class="nav-item dropdown" id="rol1">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Generadores
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{url('/generadores')}}">Alta de generadores</a></li>
                            <li><a class="dropdown-item" href="{{url('/corrientesgenerador')}}">Alta de corrientes</a></li>
                            <li><a class="dropdown-item" href="{{url('/direccionesgenerador')}}">Alta de direcciones de retiro</a></li>
                            <li><a class="dropdown-item" href="{{url('/manifiestosgenerador')}}">Libro de manifiestos</a></li>
                            <li><a class="dropdown-item" href="{{url('/listagenerador')}}">Listado de generadores</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown" id="rol2">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Transportistas
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{url('/transportistas')}}">Alta de transportes</a></li>
                            <li><a class="dropdown-item" href="{{url('/corrientestransporte')}}">Alta de corrientes</a></li>
                            <li><a class="dropdown-item" href="{{url('/choferes')}}">Alta de choferes</a></li>
                            <li><a class="dropdown-item" href="{{url('/vehiculos')}}">Alta de vehiculos </a></li>
                            <li><a class="dropdown-item" href="{{url('/generarmanifiesto')}}">Generar manifiestos</a></li>
                            <li><a class="dropdown-item" href="{{url('/imagenesmanifiestostr')}}">Cargar imagenes de manifiestos</a></li>
                            <li><a class="dropdown-item" href="{{url('/buscarmanifiestos')}}">Busqueda por n° de manifiestos</a></li>
                            <li><a class="dropdown-item" href="{{url('/libromanifiestos')}}">Libro de manifiestos</a></li>
                        </ul>
                    </li>

                    <li class="nav-item dropdown" id="rol3">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Operador de almacenamiento
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{url('/opalmacenamiento')}}">Alta de operador</a></li>
                            <li><a class="dropdown-item" href="{{url('/corrientesopalmacenamiento')}}">Alta de corrientes</a></li>
                            <li><a class="dropdown-item" href="{{url('/recibirmanifiestoalm')}}">Recibir manifiestos</a></li>
                            <li><a class="dropdown-item" href="{{url('/enviarmanifiestoalm')}}">Enviar a diposición final</a></li>
                            <li><a class="dropdown-item" href="{{url('/generarcertifrpg')}}">Generar certificado rpg/osp</a></li>
                            <li><a class="dropdown-item" href="{{url('/cargarimgrpg')}}">Cargar imagenes de rpg </a></li>
                            <li><a class="dropdown-item" href="{{url('/libromanifiestosopalm')}}">Libro de manifiestos</a></li>
                            <li><a class="dropdown-item" href="{{url('/librorpgalm')}}">Listado de rpg/osp</a></li>
                        </ul>
                    </li>

                    <li class="nav-item dropdown" id="rol4">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Operador de disposición final
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{url('/opdispfinal')}}">Alta de operador</a></li>
                            <li><a class="dropdown-item" href="{{url('/corrientesopdispfinal')}}">Alta de corrientes</a></li>
                            <li><a class="dropdown-item" href="{{url('/recibirmanifopdispfinal')}}">Recibir manifiestos</a></li>
                            <li><a class="dropdown-item" href="{{url('/generarcertdispfinal')}}">Generar certificado de diposición final</a></li>
                            <li><a class="dropdown-item" href="{{url('/cargarimgcertif')}}">Cargar imagen de certificado</a></li>
                            <li><a class="dropdown-item" href="{{url('/librocertificadoodf')}}">Libro de certificados</a></li>
                            <li><a class="dropdown-item" href="{{url('/libromanifiestosodf')}}">Libro de manifiestos</a></li>
                        </ul>
                    </li>
                    @else
                    <li class="nav-item dropdown" id="rol1">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Generadores
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{url('/generadores')}}">Alta de generadores</a></li>
                            <li><a class="dropdown-item" href="{{url('/corrientesgenerador')}}">Alta de corrientes</a></li>
                            <li><a class="dropdown-item" href="{{url('/direccionesgenerador')}}">Alta de direcciones de retiro</a></li>
                            <li><a class="dropdown-item" href="{{url('/manifiestosgenerador')}}">Libro de manifiestos</a></li>
                            <li><a class="dropdown-item" href="{{url('/listagenerador')}}">Listado de generadores</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown" id="rol2">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Transportistas
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{url('/transportistas')}}">Alta de transportes</a></li>
                            <li><a class="dropdown-item" href="{{url('/corrientestransporte')}}">Alta de corrientes</a></li>
                            <li><a class="dropdown-item" href="{{url('/choferes')}}">Alta de choferes</a></li>
                            <li><a class="dropdown-item" href="{{url('/vehiculos')}}">Alta de vehiculos </a></li>
                            <li><a class="dropdown-item" href="{{url('/generarmanifiesto')}}">Generar manifiestos</a></li>
                            <li><a class="dropdown-item" href="{{url('/imagenesmanifiestostr')}}">Cargar imagenes de manifiestos</a></li>
                            <li><a class="dropdown-item" href="{{url('/buscarmanifiestos')}}">Busqueda por n° de manifiestos</a></li>
                            <li><a class="dropdown-item" href="{{url('/libromanifiestos')}}">Libro de manifiestos</a></li>
                        </ul>
                    </li>

                    <li class="nav-item dropdown" id="rol3">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Operador de almacenamiento
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{url('/opalmacenamiento')}}">Alta de operador</a></li>
                            <li><a class="dropdown-item" href="{{url('/corrientesopalmacenamiento')}}">Alta de corrientes</a></li>
                            <li><a class="dropdown-item" href="{{url('/recibirmanifiestoalm')}}">Recibir manifiestos</a></li>
                            <li><a class="dropdown-item" href="{{url('/enviarmanifiestoalm')}}">Enviar a diposición final</a></li>
                            <li><a class="dropdown-item" href="{{url('/generarcertifrpg')}}">Generar certificado rpg/osp</a></li>
                            <li><a class="dropdown-item" href="{{url('/cargarimgrpg')}}">Cargar imagenes de rpg </a></li>
                            <li><a class="dropdown-item" href="{{url('/libromanifiestosopalm')}}">Libro de manifiestos</a></li>
                            <li><a class="dropdown-item" href="{{url('/librorpgalm')}}">Listado de rpg/osp</a></li>
                        </ul>
                    </li>

                    <li class="nav-item dropdown" id="rol4">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Operador de disposición final
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{url('/opdispfinal')}}">Alta de operador</a></li>
                            <li><a class="dropdown-item" href="{{url('/corrientesopdispfinal')}}">Alta de corrientes</a></li>
                            <li><a class="dropdown-item" href="{{url('/recibirmanifopdispfinal')}}">Recibir manifiestos</a></li>
                            <li><a class="dropdown-item" href="{{url('/generarcertdispfinal')}}">Generar certificado de diposición final</a></li>
                            <li><a class="dropdown-item" href="{{url('/cargarimgcertif')}}">Cargar imagen de certificado</a></li>
                            <li><a class="dropdown-item" href="{{url('/librocertificadoodf')}}">Libro de certificados</a></li>
                            <li><a class="dropdown-item" href="{{url('/libromanifiestosodf')}}">Libro de manifiestos</a></li>
                        </ul>
                    </li>

                    <li class="nav-item dropdown" id="rol5">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Complementos varios
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{url('/actividades')}}">Alta de actividades</a></li>
                            <li><a class="dropdown-item" href="{{url('/localidades')}}">Alta de localidades</a></li>
                            <li><a class="dropdown-item" href="{{url('/corrientesderesiduos')}}">Alta de corrientes de residuos</a></li>
                        </ul>
                    </li>

                    <li class="nav-item dropdown" id="rol6">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Administración de usuarios
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{url('/empresas')}}">Alta de empresas</a></li>
                            <li><a class="dropdown-item" href="{{url('/listaempresas')}}">Listado de empresas</a></li>
                            <li><a class="dropdown-item" href="{{url('/listausuarios')}}">Listado de usuarios</a></li>
                        </ul>
                    </li>
                    @endif



                    @guest
                    @if (Route::has('login'))
                    <li class="nav-item dropdown">
                        <a class="nav-link" href="{{ route('login') }}">Iniciar Sesion</a>
                    </li>
                    @endif

                    @if (Route::has('register'))
                    <li class="nav-item dropdown">
                        <a class="nav-link" href="{{ route('register') }}">Registrarse</a>
                    </li>
                    @endif
                    @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>

                            {{$userNombre}} {{$userApellido}}
                        </a>

                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{url('/terminos')}}">Terminos y condiciones</a>
                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                {{ __('Cerrar Sesion') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                    @endguest

                </ul>
            </div>
        </div>
    </nav>

    @yield('navbar')


</body>

</html>