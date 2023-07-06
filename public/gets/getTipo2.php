<?php

$conexion = mysqli_connect("localhost", "root", "Energia2022.", "raygroup") or die("Problemas con la conexión");

$nom_comp = $_POST['nom_comp'];

$consulta = mysqli_query($conexion, "SELECT * FROM generadorprincipal WHERE gener_nom = '$nom_comp' and dispfinal = 'NO'");
while ($fila = mysqli_fetch_array($consulta)) {
    $generador = $fila['gener_nom'];
}

if ($generador) {
    echo "<option value='ALMACENADO'>ALMACENADO</option>";
} else {
    echo "<option value='EN TRANSITO'>EN TRANSITO</option>";
}
