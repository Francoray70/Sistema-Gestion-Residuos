<?php

$conexion = mysqli_connect("localhost", "root", "Energia2022.", "raygroup") or die("Problemas con la conexión");

$id_operador_df = $_POST['id_operador_df'];

$consulta = mysqli_query($conexion, "SELECT vto_hab_nac FROM operadordispfinal WHERE id_operador_df = '$id_operador_df'");


while ($fila = mysqli_fetch_array($consulta)) { ?>
	<option name="direccion" value="<?php echo $fila['vto_hab_nac']; ?>"><?php echo $fila['vto_hab_nac']; ?></option>;
<?php } ?>