<?php

$conexion = mysqli_connect("localhost", "root", "Energia2022.", "raygroup") or die("Problemas con la conexión");

$id_transp = $_POST['id_transp'];

$consulta = mysqli_query($conexion, "SELECT id_patente FROM camiones WHERE id_transp = '$id_transp' and camio_act = 'ALTA' ORDER BY numero");

$html = "<option value=''>Seleccionar Patente</option>";

echo $html;

while ($fila = mysqli_fetch_array($consulta)) { ?>
	<option name="direccion" value="<?php echo $fila['id_patente']; ?>"><?php echo $fila['id_patente']; ?></option>;
<?php } ?>