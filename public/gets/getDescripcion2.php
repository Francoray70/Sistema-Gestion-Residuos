<?php

$conexion = mysqli_connect("localhost", "root", "Energia2022.", "raygroup") or die("Problemas con la conexión");

$id_corrientes = $_POST['id_corrientes'];

$consulta = mysqli_query($conexion, "SELECT descripcion FROM transportecorrientes WHERE id_corrientes = '$id_corrientes'");


while ($fila = mysqli_fetch_array($consulta)) { ?>
	<option name="descripcion" value="<?php echo $fila['descripcion']; ?>"><?php echo $fila['descripcion']; ?></option>;
<?php } ?>