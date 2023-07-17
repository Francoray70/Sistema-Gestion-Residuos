<?php

$conexion = mysqli_connect("localhost", "root", "Energia2022.", "raygroupnew") or die("Problemas con la conexión");

$nom_comp = $_POST['nom_comp'];

$consulta = mysqli_query($conexion, "SELECT * FROM generadorprincipal WHERE gener_nom = '$nom_comp' and dispfinal = 'NO'");
while ($fila = mysqli_fetch_array($consulta)) {
    $generador = $fila['gener_nom'];
}

if ($generador) {
    $html = "<option value=''>Seleccione</option>
    <option value='UNO'>Simple</option>
    <option value='VARIOS'>Múltiple</option>";
    echo $html;
} else {
    echo "<option value='UNO'>Simple</option>";
}
