<?php
$conexion = mysqli_connect("localhost", "root", "Energia2022.", "raygroupnew") or die("Problemas con la conexión");

$id_transp = $_POST['id_transp'];

$consulta = mysqli_query($conexion, "SELECT chofer FROM choferes WHERE id_transp = '$id_transp' and chofer_act = 'ALTA' ORDER BY chofer");

$html = "<option value=''>Seleccionar Chofer</option>";

echo $html;

while ($fila = mysqli_fetch_array($consulta)) { ?>
	<option name="direccion" value="<?php echo strtoupper($fila['chofer']); ?>"><?php echo strtoupper($fila['chofer']); ?></option>;
<?php } ?>