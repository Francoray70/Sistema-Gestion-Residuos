<?php

$conexion = mysqli_connect("localhost", "root", "Energia2022.", "raygroupnew") or die("Problemas con la conexión");

$id_transp = $_POST['id_transp'];

$consulta = mysqli_query($conexion, "SELECT manifiesto_actual,trans_nro_hab_pro,id_nro_trans FROM transportes WHERE id_transp = '$id_transp' ORDER BY manifiesto_actual");


while ($fila = mysqli_fetch_array($consulta)) { ?>
	<option name="direccion" value="<?php echo $fila['trans_nro_hab_pro'] ?>-<?php echo $fila['manifiesto_actual']; ?>"><?php echo $fila['trans_nro_hab_pro'] ?>-<?php echo $fila['manifiesto_actual']; ?></option>;
<?php } ?>