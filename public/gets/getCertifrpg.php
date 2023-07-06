<?php

$conexion = mysqli_connect("localhost", "root", "Energia2022.", "raygroup") or die("Problemas con la conexión");

$gener_nom = $_POST['gener_nom'];

$consulta = mysqli_query($conexion, "SELECT gener_nro_hab_pro,rpg_actual FROM generadorprincipal WHERE gener_nom = '$gener_nom'");

while ($fila = mysqli_fetch_array($consulta)) { ?>
	<option name="ciudad" value="<?php echo $fila['gener_nro_hab_pro']; ?>-<?php echo $fila['rpg_actual']; ?>"><?php echo $fila['gener_nro_hab_pro']; ?>-<?php echo $fila['rpg_actual']; ?></option>;
<?php } ?>