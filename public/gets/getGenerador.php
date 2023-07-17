<?php

$conexion = mysqli_connect("localhost", "root", "Energia2022.", "raygroupnew") or die("Problemas con la conexión");

$id_manifiesto = $_POST['id_manifiesto'];

$consulta = mysqli_query($conexion, "SELECT nom_comp FROM manifiesto WHERE id_manifiesto = '$id_manifiesto'");


while ($fila = mysqli_fetch_array($consulta)) { ?>
	<option name="descripcion" value="<?php echo $fila['nom_comp']; ?>"><?php echo $fila['nom_comp']; ?></option>;
<?php } ?>