<?php

$conexion = mysqli_connect("localhost", "root", "Energia2022.", "raygroup") or die("Problemas con la conexión");

$id_manifiesto = $_POST['id_manifiesto'];

$consulta = mysqli_query($conexion, "SELECT numeroo FROM manifiestodet WHERE id_manifies = '$id_manifiesto'");

while ($fila = mysqli_fetch_array($consulta)) {
	$numero = $fila['numeroo'];
}

$consulta2 = mysqli_query($conexion, "SELECT cantidad FROM manifiestodet WHERE numeroo = '$numero'");
$fila = mysqli_fetch_array($consulta2); ?>

<input type="text" name="descripcion" value="<?php echo $fila['cantidad']; ?>">;