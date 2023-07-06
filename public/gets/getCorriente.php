<?php

$conexion = mysqli_connect("localhost", "root", "Energia2022.", "raygroup") or die("Problemas con la conexión");

$id_transp = $_POST['id_transp'];

$consulta = mysqli_query($conexion, "SELECT id_corrientes FROM transportecorrientes WHERE id_transp = '$id_transp'");

$html = "<option value=''>Seleccionar Corriente</option>";

echo $html;

while ($fila = mysqli_fetch_array($consulta)) { ?>
	<option name="corriente" value="<?php echo $fila['id_corrientes']; ?>"><?php echo $fila['id_corrientes']; ?></option>;
<?php } ?>