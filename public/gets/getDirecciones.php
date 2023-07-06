<?php

$conexion = mysqli_connect("localhost", "root", "Energia2022.", "raygroup") or die("Problemas con la conexión");

$nom_comp = $_POST['nom_comp'];

$consulta = mysqli_query($conexion, "SELECT dir_de_retiro FROM generadordirecciones WHERE nom_comp = '$nom_comp' ORDER BY dir_de_retiro");

$html = "<option value=''>Seleccionar Direccion</option>";

echo $html;

while ($fila = mysqli_fetch_array($consulta)) { ?>
	<option name="direccion" value="<?php echo strtoupper($fila['dir_de_retiro']); ?>"><?php echo strtoupper($fila['dir_de_retiro']); ?></option>;
<?php } ?>