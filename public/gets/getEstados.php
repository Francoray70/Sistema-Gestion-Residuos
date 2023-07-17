<?php

$conexion = mysqli_connect("localhost", "root", "Energia2022.", "raygroupnew") or die("Problemas con la conexión");

$id_corrientes = $_POST['id_corrientes'];

$consulta = mysqli_query($conexion, "SELECT estado_cte FROM corrientes WHERE id_corrientes = '$id_corrientes'");


while ($fila = mysqli_fetch_array($consulta)) { ?>
	<option name="descripcion" value="<?php echo $fila['estado_cte']; ?>"><?php echo $fila['estado_cte']; ?></option>;
<?php } ?>