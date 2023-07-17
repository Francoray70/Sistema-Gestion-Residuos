<?php

$conexion = mysqli_connect("localhost", "root", "Energia2022.", "raygroupnew") or die("Problemas con la conexión");

$id_operador_df = $_POST['id_operador_df'];

$consulta = mysqli_query($conexion, "SELECT nro_hab_nac FROM operadordispfinal WHERE id_operador_df = '$id_operador_df'");


while ($fila = mysqli_fetch_array($consulta)) { ?>
	<option name="direccion" value="<?php echo $fila['nro_hab_nac']; ?>"><?php echo $fila['nro_hab_nac']; ?></option>;
<?php } ?>