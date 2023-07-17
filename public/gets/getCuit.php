<?php

$conexion = mysqli_connect("localhost", "root", "Energia2022.", "raygroupnew") or die("Problemas con la conexión");

$empresa = $_POST['empresa'];

$consulta = mysqli_query($conexion, "SELECT cuit FROM empresas WHERE nombre = '$empresa'");


while ($fila = mysqli_fetch_array($consulta)) { ?>
	<option value="<?php echo $fila['cuit']; ?>"><?php echo $fila['cuit']; ?></option>;
<?php } ?>