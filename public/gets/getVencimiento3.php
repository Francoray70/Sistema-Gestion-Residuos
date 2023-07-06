<?php

$conexion = mysqli_connect("localhost", "root", "Energia2022.", "raygroup") or die("Problemas con la conexión");

$gener_nom = $_POST['gener_nom'];

$consulta = mysqli_query($conexion, "SELECT gener_vto_hab_nac FROM generadorprincipal WHERE gener_nom = '$gener_nom'");


while ($fila = mysqli_fetch_array($consulta)) { ?>
	<option name="direccion" value="<?php echo $fila['gener_vto_hab_nac']; ?>"><?php echo $fila['gener_vto_hab_nac']; ?></option>;
<?php } ?>