<!DOCTYPE html>
<html>

<head>
    <!-- Agrega los enlaces a los archivos de Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <title>Gestion de residuos</title>
    <link rel="shortcat icon" href="{{asset('img/logo.ico')}}">
</head>

<body>


    <div class="container mt-6">
        <div class="alert alert-danger mt-3" role="alert">
            Para cargar un Manifiesto de tipo "Multiple" debe llenar correctamente todos los detalles.
        </div>
        <a href="{{ url()->previous() }}" class="btn btn-primary">Regresar</a>
    </div>

</body>

</html>