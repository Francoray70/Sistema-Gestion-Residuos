<?php

$conexion = mysqli_connect("localhost", "root", "Energia2022.", "raygroup") or die("Problemas con la conexión");

$id_manifiesto = $_POST['id_manifiesto'];

$consulta = mysqli_query($conexion, "SELECT numeroo, id_corrientes FROM manifiestodet WHERE id_manifies = '$id_manifiesto'");
$fila = mysqli_fetch_array($consulta); ?>

<option name="corriente" value="<?php echo $fila['id_corrientes']; ?>"><?php echo $fila['id_corrientes']; ?></option>;