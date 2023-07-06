<?php

$conexion = mysqli_connect("localhost", "root", "Energia2022.", "raygroup") or die("Problemas con la conexión");

$id_manifiesto = $_POST['id_manifiesto'];

$consulta = mysqli_query($conexion, "SELECT numeroo, descripcion FROM manifiestodet WHERE id_manifies = '$id_manifiesto'");


while ($fila = mysqli_fetch_array($consulta)) { ?>
	<option name="descripcion" value="<?php echo $fila['descripcion']; ?>"><?php echo $fila['descripcion']; ?></option>
<?php } ?>