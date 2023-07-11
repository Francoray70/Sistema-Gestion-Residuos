<!DOCTYPE html>
<html>

<head>
    <!-- Agrega los enlaces a los archivos de Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>

<body>


    <div class="container mt-6">
        <div class="alert alert-danger" role="alert">
            El registro que quiere cargar ya existe
        </div>
        <a href="{{ url()->previous() }}" class="btn btn-primary">Regresar</a>
    </div>

</body>

</html>