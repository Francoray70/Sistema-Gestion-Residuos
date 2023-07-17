<?php

$conexion = mysqli_connect("localhost", "root", "Energia2022.", "raygroupnew") or die("Problemas con la conexión");

$empresa = $_POST['empresa'];

$consulta = mysqli_query($conexion, "SELECT direccion FROM generador WHERE nom_comp = '$empresa'");


while ($fila = mysqli_fetch_array($consulta)) { ?>
	<option value="<?php echo $fila['direccion']; ?>"><?php echo $fila['direccion']; ?></option>;
<?php } ?>