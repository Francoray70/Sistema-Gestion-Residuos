<?php

$conexion = mysqli_connect("localhost", "root", "Energia2022.", "raygroupnew") or die("Problemas con la conexión");

$nom_comp = $_POST['nom_comp'];

$consulta = mysqli_query($conexion, "SELECT * FROM generadorprincipal WHERE gener_nom != '$nom_comp' ORDER BY gener_nom");
$consulta2 = mysqli_query($conexion, "SELECT * FROM generadorprincipal WHERE gener_nom = '$nom_comp'");

//PARA QUE DEJE DE SALIR EL QUE NO ES ODF COMO OPERADOR = "and dispfinal = 'SI'"

$html = "<option value=''>Seleccione operador</option>";

echo $html;

while ($fila = mysqli_fetch_array($consulta)) { ?>
	<option name="direccion" value="<?php echo strtoupper($fila['gener_nom']); ?>"><?php echo strtoupper($fila['gener_nom']); ?></option>;
<?php } ?>

<?php
while ($fil = mysqli_fetch_array($consulta2)) { ?>
	<option name="direccion" value="<?php echo strtoupper($fil['gener_nom']); ?>"><?php echo strtoupper($fil['gener_nom']); ?></option>;
<?php } ?>