<?php

$conexion = mysqli_connect("localhost", "root", "Energia2022.", "raygroup") or die("Problemas con la conexión");

$id_transp = $_POST['id_transp'];

$consulta = mysqli_query($conexion, "SELECT id_transp FROM transportes WHERE id_transp = '$id_transp' and transp_act = 'ALTA'");


while ($fila = mysqli_fetch_array($consulta)) { ?>
	<option name="direccion" value="<?php echo $fila['id_transp']; ?>"><?php echo $fila['id_transp']; ?></option>;
<?php } ?>