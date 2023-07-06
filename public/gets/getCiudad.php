<?php

$conexion = mysqli_connect("localhost", "root", "Energia2022.", "raygroup") or die("Problemas con la conexión");
mysqli_set_charset($conexion, "utf8");
$provincia = $_POST['provincia'];

$consulta = mysqli_query($conexion, "SELECT ciudades FROM ciudad WHERE provincia = '$provincia' ORDER BY ciudades");

$html = "<option value=''>Seleccionar Ciudad</option>";

echo $html;

while ($fila = mysqli_fetch_array($consulta)) { ?>
	<option value="<?php echo $fila['ciudades']; ?>"><?php echo $fila['ciudades']; ?></option>;
<?php } ?>