	<?php

	$conexion = mysqli_connect("localhost", "root", "Energia2022.", "raygroup") or die("Problemas con la conexión");

	$ciudades = $_POST['ciudades'];

	$consulta = mysqli_query($conexion, "SELECT cp FROM ciudad WHERE ciudades = '$ciudades' ORDER BY cp");


	while ($fila = mysqli_fetch_array($consulta)) { ?>
		<option value="<?php echo $fila['cp']; ?>"><?php echo $fila['cp']; ?></option>;
	<?php } ?>