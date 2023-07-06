<?php

$conexion = mysqli_connect("localhost", "root", "Energia2022.", "raygroup") or die("Problemas con la conexión");

$gener_nom = $_POST['gener_nom'];

$consulta = mysqli_query($conexion, "SELECT * FROM generador WHERE nom_comp != '$gener_nom'");

$html = "<option value=''>Seleccionar generador</option>";

echo $html;

while ($fila = mysqli_fetch_array($consulta)) { ?>
	<option name="ciudad" value="<?php echo $fila['nom_comp']; ?>"><?php echo $fila['nom_comp']; ?></option>;
<?php } ?>